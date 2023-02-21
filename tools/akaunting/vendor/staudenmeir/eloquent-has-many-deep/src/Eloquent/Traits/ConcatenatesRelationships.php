<?php

namespace Staudenmeir\EloquentHasManyDeep\Eloquent\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RuntimeException;
use Staudenmeir\EloquentHasManyDeep\Eloquent\CompositeKey;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasOneDeep;
use Staudenmeir\EloquentHasManyDeepContracts\Interfaces\ConcatenableRelation;

trait ConcatenatesRelationships
{
    /**
     * Define a has-many-deep relationship from existing relationships.
     *
     * @param \Illuminate\Database\Eloquent\Relations\Relation|callable ...$relations
     * @return \Staudenmeir\EloquentHasManyDeep\HasManyDeep
     */
    public function hasManyDeepFromRelations(...$relations)
    {
        [
            $related,
            $through,
            $foreignKeys,
            $localKeys,
            $postGetCallbacks,
            $customThroughKeyCallback,
            $customEagerConstraintsCallback,
            $customEagerMatchingCallback
        ] =
            $this->hasOneOrManyDeepFromRelations($relations);

        $relation = $this->hasManyDeep($related, $through, $foreignKeys, $localKeys);

        return $this->customizeHasOneOrManyDeepRelationship(
            $relation,
            $postGetCallbacks,
            $customThroughKeyCallback,
            $customEagerConstraintsCallback,
            $customEagerMatchingCallback
        );
    }

    /**
     * Define a has-one-deep relationship from existing relationships.
     *
     * @param \Illuminate\Database\Eloquent\Relations\Relation|callable ...$relations
     * @return \Staudenmeir\EloquentHasManyDeep\HasOneDeep
     */
    public function hasOneDeepFromRelations(...$relations)
    {
        [
            $related,
            $through,
            $foreignKeys,
            $localKeys,
            $postGetCallbacks,
            $customThroughKeyCallback,
            $customEagerConstraintsCallback,
            $customEagerMatchingCallback
        ] = $this->hasOneOrManyDeepFromRelations($relations);

        $relation = $this->hasOneDeep($related, $through, $foreignKeys, $localKeys);

        return $this->customizeHasOneOrManyDeepRelationship(
            $relation,
            $postGetCallbacks,
            $customThroughKeyCallback,
            $customEagerConstraintsCallback,
            $customEagerMatchingCallback
        );
    }

    /**
     * Prepare a has-one-deep or has-many-deep relationship from existing relationships.
     *
     * @param \Illuminate\Database\Eloquent\Relations\Relation[]|callable[] $relations
     * @return array
     */
    protected function hasOneOrManyDeepFromRelations(array $relations)
    {
        $relations = $this->normalizeVariadicRelations($relations);

        foreach ($relations as $i => $relation) {
            if (is_callable($relation)) {
                $relations[$i] = $relation();
            }
        }

        $related = null;
        $through = [];
        $foreignKeys = [];
        $localKeys = [];
        $postGetCallbacks = [];
        $customThroughKeyCallback = null;
        $customEagerConstraintsCallback = null;
        $customEagerMatchingCallback = null;

        foreach ($relations as $i => $relation) {
            if ($relation instanceof ConcatenableRelation) {
                [$through, $foreignKeys, $localKeys] = $relation->appendToDeepRelationship(
                    $through,
                    $foreignKeys,
                    $localKeys,
                    $i
                );

                if (method_exists($relation, 'postGetCallback')) {
                    $postGetCallbacks[] = [$relation, 'postGetCallback'];
                }

                if ($i === 0) {
                    if (method_exists($relation, 'getThroughKeyForDeepRelationships')) {
                        $customThroughKeyCallback = [$relation, 'getThroughKeyForDeepRelationships'];
                    }

                    if (method_exists($relation, 'addEagerConstraintsToDeepRelationship')) {
                        $customEagerConstraintsCallback = [$relation, 'addEagerConstraintsToDeepRelationship'];
                    }

                    if (method_exists($relation, 'matchResultsForDeepRelationship')) {
                        $customEagerMatchingCallback = [$relation, 'matchResultsForDeepRelationship'];
                    }
                }
            } else {
                $method = $this->hasOneOrManyDeepRelationMethod($relation);

                [$through, $foreignKeys, $localKeys] = $this->$method($relation, $through, $foreignKeys, $localKeys);
            }

            if ($i === count($relations) - 1) {
                $related = get_class($relation->getRelated());

                if ((new $related())->getTable() !== $relation->getRelated()->getTable()) {
                    $related .= ' from ' . $relation->getRelated()->getTable();
                }
            } else {
                $through[] = $this->hasOneOrManyThroughParent($relation, $relations[$i + 1]);
            }
        }

        return [
            $related,
            $through,
            $foreignKeys,
            $localKeys,
            $postGetCallbacks,
            $customThroughKeyCallback,
            $customEagerConstraintsCallback,
            $customEagerMatchingCallback
        ];
    }

    /**
     * Prepare a has-one-deep or has-many-deep relationship from an existing belongs-to relationship.
     *
     * @param \Illuminate\Database\Eloquent\Relations\BelongsTo $relation
     * @param \Illuminate\Database\Eloquent\Model[] $through
     * @param array $foreignKeys
     * @param array $localKeys
     * @return array
     */
    protected function hasOneOrManyDeepFromBelongsTo(
        BelongsTo $relation,
        array $through,
        array $foreignKeys,
        array $localKeys
    ) {
        if (is_array($relation->getOwnerKeyName())) {
            // https://github.com/topclaudy/compoships
            $foreignKeys[] = new CompositeKey(
                ...(array)$relation->getOwnerKeyName()
            );

            $localKeys[] = new CompositeKey(
                ...(array)$relation->getForeignKeyName()
            );
        } else {
            $foreignKeys[] = $relation->getOwnerKeyName();

            $localKeys[] = $relation->getForeignKeyName();
        }

        return [$through, $foreignKeys, $localKeys];
    }

    /**
     * Prepare a has-one-deep or has-many-deep relationship from an existing belongs-to-many relationship.
     *
     * @param \Illuminate\Database\Eloquent\Relations\BelongsToMany $relation
     * @param \Illuminate\Database\Eloquent\Model[] $through
     * @param array $foreignKeys
     * @param array $localKeys
     * @return array
     */
    protected function hasOneOrManyDeepFromBelongsToMany(
        BelongsToMany $relation,
        array $through,
        array $foreignKeys,
        array $localKeys
    ) {
        $through[] = $relation->getTable();

        $foreignKeys[] = $relation->getForeignPivotKeyName();
        $foreignKeys[] = $relation->getRelatedKeyName();

        $localKeys[] = $relation->getParentKeyName();
        $localKeys[] = $relation->getRelatedPivotKeyName();

        return [$through, $foreignKeys, $localKeys];
    }

    /**
     * Prepare a has-one-deep or has-many-deep relationship from an existing has-one or has-many relationship.
     *
     * @param \Illuminate\Database\Eloquent\Relations\HasOneOrMany $relation
     * @param \Illuminate\Database\Eloquent\Model[] $through
     * @param array $foreignKeys
     * @param array $localKeys
     * @return array
     */
    protected function hasOneOrManyDeepFromHasOneOrMany(
        HasOneOrMany $relation,
        array $through,
        array $foreignKeys,
        array $localKeys
    ) {
        if (is_array($relation->getForeignKeyName())) {
            // https://github.com/topclaudy/compoships
            $foreignKeys[] = new CompositeKey(
                ...(array)$relation->getForeignKeyName()
            );

            $localKeys[] = new CompositeKey(
                ...(array)$relation->getLocalKeyName()
            );
        } else {
            $foreignKeys[] = $relation->getForeignKeyName();

            $localKeys[] = $relation->getLocalKeyName();
        }

        return [$through, $foreignKeys, $localKeys];
    }

    /**
     * Prepare a has-one-deep or has-many-deep relationship from an existing has-many-through relationship.
     *
     * @param \Illuminate\Database\Eloquent\Relations\HasManyThrough $relation
     * @param \Illuminate\Database\Eloquent\Model[] $through
     * @param array $foreignKeys
     * @param array $localKeys
     * @return array
     */
    protected function hasOneOrManyDeepFromHasManyThrough(
        HasManyThrough $relation,
        array $through,
        array $foreignKeys,
        array $localKeys
    ) {
        $through[] = get_class($relation->getParent());

        $foreignKeys[] = $relation->getFirstKeyName();
        $foreignKeys[] = $relation->getForeignKeyName();

        $localKeys[] = $relation->getLocalKeyName();
        $localKeys[] = $relation->getSecondLocalKeyName();

        return [$through, $foreignKeys, $localKeys];
    }

    /**
     * Prepare a has-one-deep or has-many-deep relationship from an existing morph-one or morph-many relationship.
     *
     * @param \Illuminate\Database\Eloquent\Relations\MorphOneOrMany $relation
     * @param \Illuminate\Database\Eloquent\Model[] $through
     * @param array $foreignKeys
     * @param array $localKeys
     * @return array
     */
    protected function hasOneOrManyDeepFromMorphOneOrMany(
        MorphOneOrMany $relation,
        array $through,
        array $foreignKeys,
        array $localKeys
    ) {
        $foreignKeys[] = [$relation->getQualifiedMorphType(), $relation->getForeignKeyName()];

        $localKeys[] = $relation->getLocalKeyName();

        return [$through, $foreignKeys, $localKeys];
    }

    /**
     * Prepare a has-one-deep or has-many-deep relationship from an existing morph-to-many relationship.
     *
     * @param \Illuminate\Database\Eloquent\Relations\MorphToMany $relation
     * @param \Illuminate\Database\Eloquent\Model[] $through
     * @param array $foreignKeys
     * @param array $localKeys
     * @return array
     */
    protected function hasOneOrManyDeepFromMorphToMany(
        MorphToMany $relation,
        array $through,
        array $foreignKeys,
        array $localKeys
    ) {
        $through[] = $relation->getTable();

        if ($relation->getInverse()) {
            $foreignKeys[] = $relation->getForeignPivotKeyName();
            $foreignKeys[] = $relation->getRelatedKeyName();

            $localKeys[] = $relation->getParentKeyName();
            $localKeys[] = [$relation->getMorphType(), $relation->getRelatedPivotKeyName()];
        } else {
            $foreignKeys[] = [$relation->getMorphType(), $relation->getForeignPivotKeyName()];
            $foreignKeys[] = $relation->getRelatedKeyName();

            $localKeys[] = $relation->getParentKeyName();
            $localKeys[] = $relation->getRelatedPivotKeyName();
        }

        return [$through, $foreignKeys, $localKeys];
    }

    /**
     * Get the relationship method name.
     *
     * @param \Illuminate\Database\Eloquent\Relations\Relation $relation
     * @return string
     */
    protected function hasOneOrManyDeepRelationMethod(Relation $relation)
    {
        $classes = [
            BelongsTo::class,
            HasManyThrough::class,
            MorphOneOrMany::class,
            HasOneOrMany::class,
            MorphToMany::class,
            BelongsToMany::class,
        ];

        foreach ($classes as $class) {
            if ($relation instanceof $class) {
                return 'hasOneOrManyDeepFrom' . class_basename($class);
            }
        }

        throw new RuntimeException('This relationship is not supported.'); // @codeCoverageIgnore
    }

    /**
     * Prepare the through parent class from an existing relationship and its successor.
     *
     * @param \Illuminate\Database\Eloquent\Relations\Relation $relation
     * @param \Illuminate\Database\Eloquent\Relations\Relation $successor
     * @return string
     */
    protected function hasOneOrManyThroughParent(Relation $relation, Relation $successor)
    {
        $through = get_class($relation->getRelated());

        if ($relation instanceof ConcatenableRelation && method_exists($relation, 'getTableForDeepRelationship')) {
            return $through . ' from ' . $relation->getTableForDeepRelationship();
        }

        if ((new $through())->getTable() !== $relation->getRelated()->getTable()) {
            $through .= ' from ' . $relation->getRelated()->getTable();
        }

        if (get_class($relation->getRelated()) === get_class($successor->getParent())) {
            $table = $successor->getParent()->getTable();

            $segments = explode(' as ', $table);

            if (isset($segments[1])) {
                $through .= ' as ' . $segments[1];
            }
        }

        return $through;
    }

    /**
     * Customize a has-one-deep or has-many-deep relationship.
     *
     * @param \Staudenmeir\EloquentHasManyDeep\HasManyDeep $relation
     * @param callable[] $postGetCallbacks
     * @param callable|null $customThroughKeyCallback
     * @param callable|null $customEagerConstraintsCallback
     * @param callable|null $customEagerMatchingCallback
     * @return \Staudenmeir\EloquentHasManyDeep\HasManyDeep|\Staudenmeir\EloquentHasManyDeep\HasOneDeep
     */
    protected function customizeHasOneOrManyDeepRelationship(
        HasManyDeep $relation,
        array $postGetCallbacks,
        ?callable $customThroughKeyCallback,
        ?callable $customEagerConstraintsCallback,
        ?callable $customEagerMatchingCallback
    ): HasManyDeep|HasOneDeep {
        $relation->withPostGetCallbacks($postGetCallbacks);

        if ($customThroughKeyCallback) {
            $relation->withCustomThroughKeyCallback($customThroughKeyCallback);
        }

        if ($customEagerConstraintsCallback) {
            $relation->withCustomEagerConstraintsCallback($customEagerConstraintsCallback);
        }

        if ($customEagerMatchingCallback) {
            $relation->withCustomEagerMatchingCallback($customEagerMatchingCallback);
        }

        return $relation;
    }

    /**
     * Define a has-many-deep relationship with constraints from existing relationships.
     *
     * @param callable ...$relations
     * @return \Staudenmeir\EloquentHasManyDeep\HasManyDeep
     */
    public function hasManyDeepFromRelationsWithConstraints(...$relations): HasManyDeep
    {
        $hasManyDeep = $this->hasManyDeepFromRelations(...$relations);

        return $this->addConstraintsToHasOneOrManyDeepRelationship($hasManyDeep, $relations);
    }

    /**
     * Define a has-one-deep relationship with constraints from existing relationships.
     *
     * @param callable ...$relations
     * @return \Staudenmeir\EloquentHasManyDeep\HasOneDeep
     */
    public function hasOneDeepFromRelationsWithConstraints(...$relations): HasOneDeep
    {
        $hasOneDeep = $this->hasOneDeepFromRelations(...$relations);

        return $this->addConstraintsToHasOneOrManyDeepRelationship($hasOneDeep, $relations);
    }

    /**
     * Add the constraints from existing relationships to a has-one-deep or has-many-deep relationship.
     *
     * @param \Staudenmeir\EloquentHasManyDeep\HasManyDeep $deepRelation
     * @param callable[] $relations
     * @return \Staudenmeir\EloquentHasManyDeep\HasManyDeep|\Staudenmeir\EloquentHasManyDeep\HasOneDeep
     */
    protected function addConstraintsToHasOneOrManyDeepRelationship(
        HasManyDeep $deepRelation,
        array $relations
    ): HasManyDeep|HasOneDeep {
        $relations = $this->normalizeVariadicRelations($relations);

        foreach ($relations as $i => $relation) {
            $relationWithoutConstraints = Relation::noConstraints(function () use ($relation) {
                return $relation();
            });

            $deepRelation->getQuery()->mergeWheres(
                $relationWithoutConstraints->getQuery()->getQuery()->wheres,
                $relationWithoutConstraints->getQuery()->getQuery()->getRawBindings()['where'] ?? []
            );

            $isLast = $i === count($relations) - 1;

            $this->addRemovedScopesToHasOneOrManyDeepRelationship($deepRelation, $relationWithoutConstraints, $isLast);
        }

        return $deepRelation;
    }

    /**
     * Add the removed scopes from an existing relationship to a has-one-deep or has-many-deep relationship.
     *
     * @param \Staudenmeir\EloquentHasManyDeep\HasManyDeep $deepRelation
     * @param \Illuminate\Database\Eloquent\Relations\Relation $relation
     * @param bool $isLastRelation
     * @return void
     */
    protected function addRemovedScopesToHasOneOrManyDeepRelationship(
        HasManyDeep $deepRelation,
        Relation $relation,
        bool $isLastRelation
    ): void {
        $removedScopes = $relation->getQuery()->removedScopes();

        foreach ($removedScopes as $scope) {
            if ($scope === SoftDeletingScope::class) {
                if ($isLastRelation) {
                    $deepRelation->withTrashed();
                } else {
                    $deletedAtColumn = $relation->getRelated()->getQualifiedDeletedAtColumn();

                    $deepRelation->withTrashed($deletedAtColumn);
                }
            }

            if ($scope === 'SoftDeletableHasManyThrough') {
                $deletedAtColumn = $relation->getParent()->getQualifiedDeletedAtColumn();

                $deepRelation->withTrashed($deletedAtColumn);
            }

            if (str_starts_with($scope, HasManyDeep::class . ':')) {
                $deletedAtColumn = explode(':', $scope)[1];

                $deepRelation->withTrashed($deletedAtColumn);
            }
        }
    }

    /**
     * Normalize the relations from a variadic parameter.
     *
     * @param array $relations
     * @return array
     */
    protected function normalizeVariadicRelations(array $relations): array
    {
        return is_array($relations[0]) && !is_callable($relations[0]) ? $relations[0] : $relations;
    }
}

<?php
namespace Acme\Blog\Domain\Repository;

/*                                                                        *
 * This script belongs to the Flow package "Acme.Blog".                   *
 *                                                                        *
 *                                                                        */

use Acme\Blog\Domain\Model\Blog;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class BlogRepository extends Repository {

        /**
         * Finds the active blog.
         *
         * For now, only one Blog is supported anyway so we just assume that only one
         * Blog object resides in the Blog Repository.
         *
         * @return Blog The active blog or FALSE if none exists
         */
        public function findActive() {
                $query = $this->createQuery();
                return $query->execute()->getFirst();
        }

}
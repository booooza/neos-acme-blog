<?php
namespace Acme\Blog\Controller;

/*
 * This file is part of the Acme.Blog package.
 */

use Acme\Blog\Domain\Repository\BlogRepository;
use Acme\Blog\Domain\Repository\PostRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Acme\Blog\Domain\Model\Post;
use Neos\Flow\Mvc\View\ViewInterface;

class PostController extends ActionController
{

    /**
     * @Flow\Inject
     * @var BlogRepository
     */
    protected $blogRepository;

    /**
     * @Flow\Inject
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * @param ViewInterface $view
     * @return void
     */
    protected function initializeView(ViewInterface $view) {
        $blog = $this->blogRepository->findActive();
        $this->view->assign('blog', $blog);
    }

    /**
     * @return void
     */
    public function indexAction() {
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $post
     * @return void
     */
    public function showAction(Post $post)
    {
        $this->view->assign('post', $post);
    }

    /**
     * Displays the "Create Post" form
     *
     * @return void
     */
    public function newAction() {
    }

    /**
     * Creates a new post
     *
     * @param Post $newPost
     * @return void
     */
    public function createAction(Post $newPost) {
        $this->postRepository->add($newPost);
        $this->addFlashMessage('Created a new post.');
        $this->redirect('index');
    }

    /**
     * Displays the "Edit Post" form
     *
     * @param Post $post
     * @return void
     */
    public function editAction(Post $post) {
        $this->view->assign('post', $post);
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $post
     * @return void
     */
    public function updateAction(Post $post)
    {
        $this->postRepository->update($post);
        $this->addFlashMessage('Updated the post.');
        $this->redirect('index');
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $post
     * @return void
     */
    public function deleteAction(Post $post)
    {
        $this->postRepository->remove($post);
        $this->addFlashMessage('Deleted a post.');
        $this->redirect('index');
    }
}

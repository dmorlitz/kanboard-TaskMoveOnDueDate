<?php
namespace Kanboard\Plugin\TaskMoveOnDueDate;
use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\TaskMoveOnDueDate\Action\TaskMoveOnDueDate;
class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new TaskMoveOnDueDate($this->container));
    }
    public function getPluginName()
    {
        return 'TaskMoveOnDueDate';
    }

    public function getPluginDescription()
    {
        return t('Automatically move a task to a specific column on the date');
    }

    public function getPluginAuthor()
    {
        return 'David Morlitz';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/dmorlitz/kanboard-TaskMoveOnDueDate';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.44';
    }
}

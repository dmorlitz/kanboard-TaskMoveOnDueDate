<?php

namespace Kanboard\Plugin\TaskMoveOnDueDate\Action;

use Kanboard\Model\TaskModel;
use Kanboard\Action\Base;

/**
 * Assign a color to a priority
 *
 * @package Kanboard\Action
 * @author  Julien Buratto
 */
class TaskMoveOnDueDate extends Base
{
    /**
     * Get action description
     *
     * @access public
     * @return string
     */
    public function getDescription()
    {
        return t('Automatically move a task when due date is passed');
    }

    /**
     * Get the list of compatible events
     *
     * @access public
     * @return array
     */
    public function getCompatibleEvents()
    {
        return array(
            TaskModel::EVENT_DAILY_CRONJOB,
        );
    }

    /**
     * Get the required parameter for the action
     *
     * @access public
     * @return array
     */
    public function getActionRequiredParameters()
    {
        return array(
            'column_id' => t('Column'),
        );
    }

    /**
     * Get all tasks
     *
     * @access public
     * @return array
     */

    public function getEventRequiredParameters()
    {
        return array('tasks');
    }

    /**
     * Execute the action (change the task column)
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool            True if the action was executed or false when not executed
     */
    public function doAction(array $data)
    {
        $results = array();

        foreach ($data['tasks'] as $task) {
            if ($task['date_due'] <= time() && $task['date_due'] > 0) {
                $values = array(
                    'id'       => $task['id'],
                    'column_id' => $this->getParam('column_id'),
                );
                $results[] = $this->taskModificationModel->update($values, false);
            }
        }

        return in_array(true, $results, true);
    }

    /**
     * Check if the event data meet the action condition
     *
     * @access public
     * @param  array   $data   Event data dictionary
     * @return bool
     */
    public function hasRequiredCondition(array $data)
    {
        return count($data['tasks']) > 0;
    }
}

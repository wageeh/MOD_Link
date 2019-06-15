<?php

namespace Drupal\cron_weeklyfetch\Plugin\QueueWorker;

/**
 * A report worker.
 *
 * @QueueWorker(
 *   id = "cron_weeklyfetch_queue_1",
 *   title = @Translation("First worker in cron_weeklyfetch"),
 *   cron = {"time" = 1}
 * )
 *
 * QueueWorkers are new in Drupal 8. They define a queue, which in this case
 * is identified as cron_weeklyfetch_queue_1 and contain a process that operates on
 * all the data given to the queue.
 *
 * @see queue_weeklyfetch.module
 */
class ReportWorkerOne extends ReportWorkerBase {

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    $this->reportWork(1, $data);
  }

}

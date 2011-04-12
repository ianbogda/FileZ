

<div class="file-attributes">
  <p class="filesize">(<?php echo $file->getReadableFileSize () ?>)</p>
  <p class="download-counter">
      <?php echo ($file->download_count == 0 ? __ ('Never downloaded') : (
                  $file->download_count == 1 ? __ ('Downloaded once') :
                                               __r('Download %x% times', array(
                                                'x' => (int) $file->download_count
      )))); // TODO ugly DIY plural ... ?>
  </p>
  <p class="availability"><?php echo __r('Available from %from% to %to%', array (
    'from' => ($file->getAvailableFrom  ()->get (Zend_Date::MONTH) ==
               $file->getAvailableUntil ()->get (Zend_Date::MONTH)) ?
               $file->getAvailableFrom ()->toString ('d') : $file->getAvailableFrom ()->toString ('d MMMM'),
    'to' =>  '<b>'.$file->getAvailableUntil ()->toString ('d MMMM').'</b>')) // FIXME I18N ?>
  </p>
</div>

<div class="file-description">
  <p class="filename">
    <a href="<?php echo $file->getDownloadUrl () ?>">
      <?php echo h ( truncate_string ($file->file_name, 40)) ?>
    </a>
  </p>
  <p class="comment"><?php echo $file->comment ?> &nbsp;</p>
</div>



<div class="clearboth"></div>
<ul class="actions">
  <li>
    <a href="<?php echo $file->getDownloadUrl () ?>/email" class="send-by-email">
      <?php echo __('Email') ?>
    </a>
  </li>
  <li>
    <a href="<?php echo $file->getDownloadUrl () ?>/delete" class="delete">
      <?php echo __('Delete') ?>
    </a>
  </li>
  <?php if ($file->extends_count < fz_config_get ('app', 'max_extend_count')): ?>
    <li>
      <a href="<?php echo $file->getDownloadUrl () ?>/extend" class="extend">
        <?php echo __('Extend one more day') ?>
      </a>
    </li>
  <?php endif ?>
</ul>


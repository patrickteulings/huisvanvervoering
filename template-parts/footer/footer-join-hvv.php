<?php

/**
 * Displays a action item to join Huis Van Vervoering.
 *
 * @package WordPress
 * @subpackage Huis_Van_Vervoering
 * @since Huis Van Vervoering 1.0
 */
?>
<section class="section join">
  <div class="section__inner">
    <div class="join-container">
      <h4><?= get_field('join_us_call_to_action_title', 7) ?></h4>
      <p><?= get_field('join_us_call_to_action_block', 7) ?></p>
      <a class="btn-arrow" role="button" href="<?php echo get_page_link(7); ?>">
        <span class="screen-reader-text">Naar de inschrijfpagina</span>
        <svg width="36" height="37" viewBox="0 0 36 37" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0607 7.22498C18.4749 6.6392 17.5251 6.6392 16.9393 7.22498C16.3536 7.81077 16.3536 8.76052 16.9393 9.3463L24.8787 17.2856H7.5C6.67157 17.2856 6 17.9572 6 18.7856C6 19.6141 6.67157 20.2856 7.5 20.2856H24.8787L16.9393 28.225C16.3536 28.8108 16.3536 29.7605 16.9393 30.3463C17.5251 30.9321 18.4749 30.9321 19.0607 30.3463L29.5607 19.8463C30.1464 19.2605 30.1464 18.3108 29.5607 17.725L19.0607 7.22498Z" fill="white" />
        </svg>
      </a>
    </div>
  </div>
</section>
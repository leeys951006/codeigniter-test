<div class="container">
	<?php echo form_open("members/make"); ?>
      <dl>
          <dt>email</dt>
          <dd>
            <input type="text" name="email" value="" />
          </dd>
      </dl>
      <dl>
          <dt>password</dt>
          <dd>
            <input type="password" name="password" value="" />
          </dd>
      </dl>

      <button type="submit">저장하기</button>
  <?php form_close(); ?>
</div>
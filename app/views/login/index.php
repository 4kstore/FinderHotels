<section class="container login-container">
  <div class="login-form">
    <form action="" method="post" autocomplete="off">
      <h1>Login Form</h1>
      <?= !$login_status ? '<p class="invalid">Incorrect username or password</p>' : ''; ?>
      <div class="input-field">
        <input placeholder="Username" name="user" type="text" required>
      </div>
      <div class="input-field">
        <input placeholder="Password" type="password" name="pass" required autocomplete="new-password">
      </div>
      <div class="input-field">
        <select required name="airline">
          <option value="" disabled selected>Select Airline</option>
      <?php if (!empty($airlines)): ?>
        <?php foreach ($airlines as $airline): ?>
          <option value="<?= strtoupper($airline->code) ?>"><?= $airline->display_name ?></option>
        <?php endforeach ?>
      <?php endif ?>
        </select>
      </div>
      <div class="actions">
        <button>Login</button>
      </div>
    </form>
  </div>
</section>

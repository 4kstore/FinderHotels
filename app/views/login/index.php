<section class="container login-container">
  <div class="login-form">
    <form action="" autocomplete="off">
      <h1>Login Form</h1>
      <div class="input-field">
        <input placeholder="Username" name="user" type="text" required>
      </div>
      <div class="input-field">
        <input placeholder="Password" type="password" name="password" required autocomplete="new-password">
      </div>
      <div class="input-field">
        <select name="airline">
          <option value="" disabled selected>Select Airline</option>
      <?php if (!empty($airlines)): ?>
        <?php foreach ($airlines as $airline): ?>
          <option value="<?= $airline->id ?>"><?= $airline->display_name ?></option>
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
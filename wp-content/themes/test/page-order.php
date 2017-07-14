<?php get_header(); ?>
<div class="row">
  <div class="col-md-6">
    <form action="">
    <div class="form-group products">
    <label for="productslist">Select product:</label>
      <select class="form-control" id="productslist">
        <option>Пункт 1</option>
        <option>Пункт 2</option>
      </select>
    </div>
    <div class="form-group userdata">
      <label for="firstname">First name:</label>
      <input class="form-control" type="text" id="firstname" placeholder="First name">
      <label for="lastname">Last name:</label>
      <input class="form-control" type="text" id="lastname" placeholder="Last name">
      <label for="email">Email:</label>
      <input class="form-control" type="email" id="email" placeholder="Email">
    </div>
    <div class="form-group delivery">
    <label for="delivery">Select delivery method:</label>
      <select class="form-control" id="delivery">
        <option>Пункт 1</option>
        <option>Пункт 2</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Order</button>
    </form>
  </div>
</div>
<?php get_footer(); ?>

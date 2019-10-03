<?php
get_header();
?>
    <!--js-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php
/**
 * Timezones list with GMT offset
 *
 * @return array
 * @link http://stackoverflow.com/a/9328760
 */
function tz_list() {
  $zones_array = array();
  $timestamp = time();
  foreach(timezone_identifiers_list() as $key => $zone) {
    date_default_timezone_set($zone);
    $zones_array[$key]['zone'] = $zone;
    $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
  }
  return $zones_array;
}
?>
<div id="result"></div>
<?php

//get 1st from set values
$firstname_tr_var = get_transient('organiser_sign_up'); 
 echo $firstname_tr_var['firstname'];
 var_dump($firstname_tr_var);
 var_dump($firstname_tr_var['firstname']);

 delete_transient('organiser_sign_up');
?>


<!-- HIDDEN / POP-UP DIV -->
<div id="pop-up">
      <p>
        This div only appears when the trigger link is hovered over. Otherwise it is hidden from view.
      </p>
</div>
  
<form>
  <div class="sign-up-email">
        <div class="form-group col-md-12 ">
               <input type="text" 
               name="fname" 
               placeholder="Your first name"
               value="<?php  echo $firstname_tr_var['firstname']; ?>" 
               required="required"
               disabled>
        </div>
  </div>
  <div class="sign-up-email">
        <div class="form-group col-md-12 ">
        <input type="text" 
               name="lname" 
               placeholder="Your last name"
               value="<?php  echo $firstname_tr_var['lastname']; ?>" 
               required="required" hidden
               disabled>
        </div>
  </div>


  <div class="sign-up-email">
        <div class="form-group col-md-12 ">
        <input type="text" 
               name="emailname" 
               placeholder="Your email"
               value="<?php  echo $firstname_tr_var['email']; ?>" 
               required="required"
               disabled>
        </div>
  </div>


  <div class="form-row">
    <div class="sign-up-email">
      <div class="form-group col-md-12 ">
          <label for="inputOrganisationName"></label>
          <input type="text" class="form-control" id="inputOrganisationName" placeholder="Organisation Name">
      </div>
    </div>


  <div class="sign-up-email">
        <div class="form-group col-md-12 ">
              <div class="url-prefix">
                    <div class="input text required" aria-required="true">
                        <input type="text" 
                          name="url" 
                          class="form-control required url_input" 
                          id="url_input"
                          required="required"
                          placeholder="Your desired URL" 
                          maxlength="200" 
                          autocomplete="off"
                          aria-required="true">
                    </div>
              </div>
        <div class="url-suffix"><?php echo WA_MAIN_SITE_VIEW; ?></div>
          <span class="note" id="messageurl"></span>
        </div> 
        </div>

  <div class="sign-up-email">
        <div class="form-group col-md-6">
            <label for="inputPassword"></label>
            <input type="password" 
            class="form-control" 
            id="inputPassword" 
            placeholder="Password">
        </div>
  </div>

  <div class="sign-up-email">
        <div class="form-group col-md-6">
            <label for="inputPassword2"></label>
            <input type="password" 
            class="form-control" 
            id="inputPassword2" 
            placeholder="Confirm Password">
       </div>
  </div>

  <div class="sign-up-email">
        <div class="form-group col-md-6">
            <label for="Address1"></label>
            <input type="text" 
            class="form-control" 
            id="address1" 
            placeholder="Address Line 1">
        </div>
  </div>

  <div class="sign-up-email">
        <div class="form-group col-md-6">
          <label for="Address2"></label>
          <input type="text" 
          class="form-control" 
          id="address2" 
          placeholder="Address Line 2">
        </div>
  </div>


<div class="sign-up-email">  
      <div class="form-group col-md-6">
          <label for="city"></label>
          <input type="city" 
          class="form-control" 
          id="city" 
          placeholder="City">
      </div>
</div>


<div class="sign-up-email">
    <div class="form-group col-md-6">
          <label for="postcode"></label>
          <input type="text" 
          class="form-control" 
          id="postcode" 
          placeholder="Post Code">
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-6">
          <label for="inputState"></label>
          <select id="inputState" class="form-control">
            <option selected>State</option>
            <option>...</option>
          </select>
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-6">
        <label for="inputCountry"></label>
        <select id="inputCountry" class="form-control">
        <option selected>Country</option>
        <option>...</option>
        </select>
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-6">
      <label for="phone"></label>
      <input type="number" 
      class="form-control" 
      id="phone" 
      placeholder="Phone">
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-6">
         <label for="mobile"></label>
         <input type="number" 
         class="form-control" 
         id="mobile" 
         placeholder="Mobile">
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-6">
       <select class= "">
       <option value="0">Timezone</option>
       <?php foreach(tz_list() as $t) { ?>
       <option value="<?php print $t['zone'] ?>">
       <?php print $t['diff_from_GMT'] . ' - ' . $t['zone'] ?>
       </option>
       <?php } ?>
       </select>
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-4">
      <label for="affiliate"></label>
      <input type="text" 
      class="form-control" 
      id="affiliate" 
      placeholder="Affiliate"> 
    </div>

    <div class="form-group col-md-2">
        <a href="#" class="trigger">?</a>
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-6">
        <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">CONFIRM</button>
    </div>
</div>

<div class="sign-up-email">
    <div class="form-group col-md-12">
         <button> Back </button>
    </div>
</div>

</form>
<?php get_footer(); ?>

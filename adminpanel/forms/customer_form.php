<fieldset>
    <div class="form-group">
        <label for="f_name">full Name *</label>
          <input type="text" name="fullname" value="<?php echo $edit ? $customer['fullname'] : '' ?>" placeholder="First Name" class="form-control" required="required" id = "f_name" >
    </div> 

    <div class="form-group">
        <label>is candidate Verified? * </label>
        <label class="radio-inline">
            <input type="radio" name="verification" value="1" <?php echo ($edit &&$customer['verification'] =='1') ? "checked": "" ; ?>  required="required" id="yes"/> YES
        </label>
        <label class="radio-inline">
            <input type="radio" name="verification" value="0" <?php echo ($edit && $customer['verification'] =='0')? "checked": "" ; ?> required="required" id="no"/> NO
        </label>
    </div>




    <div class="form-group">
        <label>is candidate Subscribed ? * </label>
        <label class="radio-inline">
            <input type="radio" name="subscribed" value="1" <?php echo ($edit &&$customer['subscribed'] =='1') ? "checked": "" ; ?>  required="required" id="yes"/> YES
        </label>
        <label class="radio-inline">
            <input type="radio" name="subscribed" value="0" <?php echo ($edit && $customer['subscribed'] =='0')? "checked": "" ; ?> required="required" id="no"/> NO
        </label>
    </div>
<script>
setInterval(() => {
    const no = document.getElementById('no');
    const plan = document.getElementById('plan');

    
    if(no.checked){
       plan.setAttribute("disabled", "true") ;
        return;
    }
    else{
        plan.removeAttribute("disabled") ;
        plan.setAttribute("value", "NULL") ;
    }
        
}, 500);
  
</script>
   
    
    <div class="form-group">
        <label>subscription_type </label>
           <?php $opt_arr = array( "NULL","BASIC", "PREMIUM", "ULTIMATE"); 
                            ?>
            <select name="subscription_type"  id="plan"class="form-control selectpicker" <?php echo ($customer['subscribed'] == 0 )? "disabled" : "";?> >
                <option value=" " >Please select type</option>
                <?php
                foreach ($opt_arr as $opt) {
                    if ($edit && $opt == $customer['subscription_type']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
                }

                ?>
            </select>
    </div>  
    <div class="form-group">
        <label for="email">Email</label>
            <input  type="email" name="email" value="<?php echo $edit ? $customer['email'] : '' ?>" placeholder="E-Mail Address"  required="required" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="email">Password</label>
            <input  type="text" name="password" value="<?php echo $edit ? $customer['password'] : '' ?>" placeholder="password"  required="required" class="form-control" id="email">
    </div>




    <div class="form-group">
        <label for="phone">Phone</label>
            <input name="mobile" value="<?php echo $edit ? $customer['mobile'] : '' ?>"  required="required" placeholder="987654321" class="form-control"  type="text" id="phone">
    </div> 

   

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>

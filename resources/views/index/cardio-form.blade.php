<form class="cardio-form" id="cardio-form">
    <div id="enrol" style="width:fit-content;display:none;font-size:20px;font-weight:bold ;background-color:var(--main-color);
    border-radius:5px;padding:5px 20px 5px 20px">
     <span id="ce" >CE</span><span id="enrol-nmbr"></span>

</div>
   
    <input type="hidden" name="enrol_id" id="enrol_id">
    <input type="hidden" name="_id" id="id" value="{{Session()->get('id')}}">
    <input type="hidden" name="user_name" id="user_name" value="{{Session()->get('AuthName')}}">
    <div class="field-margin">
        <div>
            <label>So Now let me confirm your information that I have Here</label>
        </div>
        <div style="position:relative ;bottom:33px; margin-right:71px ;float:right">
            <input type="text" name="firstName" id="firstName" class="field-style" required placeholder="First Name" >
            <input type="text" name="lastName" id="lastName" class="field-style" required placeholder="Last Name"
                style="margin-top: 4px;">
        </div>
    </div>
    <div class="field-margin">
        <div >
            <label>Confirm DOB</label>
        </div>
        <div style="position:relative ;bottom:29px; margin-right:257px ;float:right">
            <input type="date" name="dob" id="dob" class="field-style " style="width:181px" required>
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>Confirm best phone number</label>
        </div>
        <div style="position:relative ;bottom:29px; margin-right:257px ;float:right">
            <input type="number" name="phone" id="phone" class="field-style " required
                placeholder="Phone number">
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>Confirm shipping address</label>
        </div>
        <div style="position:relative ;bottom:33px; margin-right:68px ;float:right">
            <div style="width: 370px;">
            <input type="number" name="zip" id="zip" class="field-style" required placeholder="Zip Code">
            <input type="text" name="apt" id="apt" class="field-style" required placeholder="Apt#"
                style="margin-top: 4px;"><br>
            <input type="text" name="street" id="street" class="field-style " style="margin-top:4px;width:366px;min-width: 180px;" required
                placeholder="Street Name"><br>
            <select type="text" name="state" id="state" class="field-style" style="margin-top: 4px;width:181px;"  required>
               <option>STATE</option>
            </select>
            <select list="city" name="city"  id="city"class="field-style city" style="margin-top: 4px;width:181px;"  required placeholder="CITY">
              <option>CITY</option>
            </select>
        </div>
      </div>
    </div>
    <div class="field-margin" style="margin-top:120px">
        <div>
            <label>Are you suffering from heart Problems?</label>
        </div>
        <div style="position:relative ;bottom:28px; margin-right:257px ;float:right">
        <select name="cardio" id="cardio" class="field-style " required style="width:181px">
            <option value=""></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            <option value="not sure">Not Sure</option>
        </select>
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>Do u have slow or fast heart rate?</label>
        </div>
        <div style="position:relative ;bottom:28px; margin-right:257px;float:right">
        <select name="hrt_rate" id="hrt_rate" class="field-style " required style="width:181px">
            <option value=""></option> 
            <option value="yes">Yes</option>
            <option value="no">No</option>
            <option value="not sure">Not Sure</option>
        </select>
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>Do u have a pace maker or any device in the heart?</label>
        </div>
        <div style="position:relative ;bottom:28px; margin-right:257px ;float:right">
        <select name="pace_mkr" id="pace_mkr" class="field-style " required style="width:181px">
            <option value=""></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>        
        </select>
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>Do u have Other Cardio conditions?</label>
        </div>
        <div style="position:relative ;bottom:33px; margin-right:73px ;float:right">
            <textarea name="other_cardio" id="other_cardio" class="field-style" cols="46" rows="3"
                style="resize: none;"></textarea>
        </div>
    </div>
    <div class="field-margin" style="margin-top:100px">
        <div>
            <label>What is your current height?</label>
        </div>
        <div style="position:relative ;bottom:29px; margin-right:257px ;float:right">
            <input type="number" name="height" id="height" class="field-style " required placeholder="inch">
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>What is your current Weight?</label>
        </div>
        <div style="position:relative ;bottom:29px; margin-right:257px ;float:right">
            <input type="number" name="weight" id="weight" class="field-style " required placeholder="pound">
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label style="margin-bottom: 30px; font-weight: bold;">So , Now let me tell you that we are going
                to send you your products after your doctor approval through
                your insurance, so that everything would be under your doctor’s supervision :</label>
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>Now May I have your doctor name?</label></label>
        </div>
        <div class="" style="position:relative ;bottom:29px; margin-right:257px ;float:right">
            <input type="text" name="dr_name" id="dr_name" class="field-style" required
                placeholder="Dr's Name">
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>What is your dr's phone number?</label>
        </div>
        <div style="position:relative ;bottom:29px; margin-right:257px ;float:right">
            <input type="number" name="dr_phone" id="dr_phone" class="field-style" required
                placeholder="Dr's Phone number">
        </div>
    </div>
    <div class="field-margin" style="margin-top:54px">
        <div>
            <label>Dr's NPI number</label>
        </div>
        <div style="position:relative ;bottom:33px; margin-right:66px ;float:right">
            <input type="number" name="npi" id="npi" class="field-style" required placeholder="NPI">
            <a href="https://npiregistry.cms.hhs.gov/" target="_blank" rel="noopener noreferrer"><input type="button"
                    class=" link-btn" value="Get NPI"></a>
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label style="margin-bottom: 30px; font-weight: bold;">This is a benefit from Medicare coverage is
                that you will get the products through your insurance and under your
                doctor’s supervision so would you please grab your card while i am holding the line for you to be able
                to
                check your
                eligibility? </label>
        </div>
    </div>
    <div class="field-margin">
        <div>
            <label>Please provide me with your Medicare number</label><br>
        </div>
        <div style="position:relative ;bottom:33px; margin-right:-11px ;float:right">
            <input type="text" name="mdcr" id="mdcr" class="field-style" required placeholder="Medicare ID">
            <a href="https://www.trizettoprovider.com/solutions/patient-engagement/eligibility" target="_blank"
                rel="noopener noreferrer"><input type="button" class=" link-btn" value="Check Eligibility"></a>
               <div class="submit-btn  field-margin " id="form_submit" onclick="enrollmentCtrl('view/submit_enrollment')" style="width: 371px;margin-right: 80px;">
                    <p id="p">Submit Enrollment</p>
                    <div class="spinner" id="load" style="bottom:61px; right:244px"></div>
                </div>
            <div class="submit-btn  field-margin " id="form_update" onclick="enrollmentCtrl('view/update_enrollment')" style="display:none;width: 371px;margin-right: 80px;">
                    <p id="p1">Update Enrollment</p>
                    <div class="spinner" id="load1" style="bottom:61px; right:244px"></div>              
            </div>
        </div>
    </div>
</form>













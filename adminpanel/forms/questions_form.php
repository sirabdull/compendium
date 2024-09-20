<fieldset>


<label for="year">Select Year</label>
<select name="year" id="year" >

<?php
function select(){
    if($edit && $question['year']){
        echo 'selected';
    }
}
?>


<!-- DISPLAY ALL QUESTION YEARS USING A LOOP -->
<script>

    let year = 2022;
    while( year >= 2000){
        
    const parent = document.getElementById('year');
    const  option = document.createElement('option');
option.setAttribute('value', year);
option.innerHTML = year;

parent.appendChild(option);
year--

    }

</script>

<!-- DISPLAY ALL QUESTION SUBJECT USING A LOOP -->

</select>
<label for="subject"> subject</label>
<select name="subject" id="subject" >
    <script>
function add(value)  {
            const subject = document.getElementById('subject');
const child = document.createElement('option');
child.setAttribute('value', value);
child.innerHTML = value;
subject.appendChild(child);

        }

        const subs = ['english', 'general', 'calculation'];
        subs.forEach(add);  
    </script>
</select>

<div class="mb-3">
    <label for="" class="form-label">Question_TEXT</label>
    <textarea class="form-control" name="question_text" value="" id=" " rows="3"><?php echo $edit ? $question['question_text'] : '';?></textarea>
</div>
<div class="mb-3">
    <label for="question_image" class="form-label">Question_image</label>
   <input name="question_image" type="file" >
    <small id="helpId" class="form-text text-info">please upload a question image leave empty if no image</small>
</div>


<div class="mb-3">
    <label for="image" class="form-label">Answer_Explanation</label>
    <textarea
        type="text"
        class="form-control"
        name="explanation"
        id="image"
        aria-describedby="helpId"
        placeholder=" "
        value ="<?php echo $edit ? $question['explanation'] : '';?>"
      > </textarea>
    <small id="helpId" class="form-text text-info">Explain the answer to the provided question</small>
</div>


<div class="mb-3">
    <label for="" class="form-label">Option_1</label>
    <textarea class="form-control" name="option_1" value=" id="" rows="3"><?php echo $edit ? $question['option_1'] : '' ?></textarea>
</div>

<div class="mb-3">
    <label for="" class="form-label">OPtion_2</label>
    <textarea class="form-control" name="option_2" value="" id="" rows="3"><?php echo $edit ? $question['option_2'] : '';?></textarea>
</div>

<div class="mb-3">
    <label for="" class="form-label">Option_3</label>
    <textarea class="form-control" name="option_3" value="" id="" rows="3"><?php echo $edit ? $question['option_3'] : '';?></textarea>
</div>

<div class="mb-3">
    <label for="" class="form-label">Option_4</label>
    <textarea class="form-control" name="option_4" value="" id="" rows="3"><?php echo $edit ? $question['option_4'] : '';?></textarea>
</div>
<label for="correct_option"> Correct_Option</label>
<input type="number" name="correct_option" value="<?php echo $edit ? $question['correct_option'] : '';?>" min="1" max="4" id="">


        <button type="submit" class="btn btn-warning btn-lg" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php with Laravel Technology.</title>
</head>
<body>
  
    <h2 class="form-validation">Form Validation</h2>
    <p><span class="error">*</span></p>

    <!-- OOP - Means == Object Orrented Programming -->
    
    <?php
        class UiDesigner{
            public $designerName;
            public $designerExperienceYear;
            public $designerExperienceSkils;
            
            function set_name_1($designerExperienceYear){
                $this->designerExperienceYear = $designerExperienceYear;
            }
            function set_design_experience_skil($designerExperienceSkils){
                $this->designerExperienceSkils = $designerExperienceSkils; 
            }
            function set_design_name($designerName){
                $this->designerName = $designerName;
            }
        }
        // Obj Here
        $designerName = new UiDesigner();
        $designerName->set_design_name("Tarek Hossain");

        $designerExperienceYear = new UiDesigner();
        $designerExperienceYear->set_name_1('3+');

        $designerExperienceSkils = new UiDesigner();
        $designerExperienceSkils->set_design_experience_skil('Html,Css,Js,Php,React,Next js,Git,Github');

        $designerKnow = new UiDesigner();
        $designerTimes->designSumm('4 time week and times.');

        echo $designerName->designerName. "<br>";
        echo $designerExperienceYear->designerExperienceYear . "<br>";
        echo $designerExperienceSkils->designerExperienceSkils;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Happy Friends birthdate year and time</title>
    </head>
    <body>
        
    </body>
    </html>
    
</body>
</html>
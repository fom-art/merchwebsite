<?php

class Utils
{
    function isPostSet($POST): bool
    {
        return $POST && $POST["confirm"] = "confirm";
    }

    function isSignInSuccessful($POST): bool
    {
        require_once("../database/DatabaseHandler.php");
        require_once("Validation.php");
        $email = $POST["email"];
        $password = $POST["password"];
        $database = new DatabaseHandler();
        $validation = new Validation();
        return $this->isPostSet($POST) && $validation->validateSignInForm($email, $password) * $database->checkUserForLogIn($email, $password);
    }

    public static function printInputBlock($id, $label, $name, $value, $validationMessage, $isValid, $isPostSet)
    {
        ob_start();
        ?>
        <div class="input-block" id="<?php echo $id; ?>">
            <div class="label-block">
                <label for="<?php echo $name; ?>"><?php echo $label; ?>:</label>
            </div>
            <input type="<?php echo $id === 'password-input-block' || $id === 'repeat-password-input-block' ? 'password' : 'text'; ?>"
                   id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo htmlspecialchars($value); ?>"
                   required>
            <div class="validation-error-block">
                <p class="js-validation-message"><?php echo $validationMessage; ?></p>
                <?php if (!$isValid && $isPostSet) {
                    echo "<p>*</p>";
                } ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
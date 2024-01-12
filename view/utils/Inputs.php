<?php

class Inputs
{
    public static function printInputBlock($id, $label, $name, $value, $validationMessage, $isValid)
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
                <?php if (!$isValid && isset($_POST['confirm'])) {
                    echo "<p>*</p>";
                } ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
}
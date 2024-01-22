<?php

/**
 * Class Inputs
 *
 * This class defines methods to print various input blocks and CSRF tokens in HTML forms.
 */
class Inputs
{
    /**
     * Print an input block for text or password input.
     *
     * @param string $id              The ID attribute for the input block.
     * @param string $label           The label text for the input.
     * @param string $name            The name attribute for the input.
     * @param string $value           The value of the input.
     * @param string $validationMessage The validation message to display.
     * @param bool   $isValid         Indicates if the input is valid.
     *
     * @return string The HTML for the input block.
     */
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
                <?php if (!$isValid && $value != "") {
                    echo "<p>".$validationMessage."</p>";
                } ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Print an input block for file upload.
     *
     * @param string $id              The ID attribute for the input block.
     * @param string $label           The label text for the input.
     * @param string $name            The name attribute for the input.
     * @param string $validationMessage The validation message to display.
     * @param bool   $isValid         Indicates if the input is valid.
     *
     * @return string The HTML for the file input block.
     */
    public static function printFileInputBlock($id, $label, $name, $validationMessage, $isValid)
    {
        ob_start();
        ?>
        <div class="input-block" id="<?php echo $id; ?>">
            <div class="label-block">
                <label for="<?php echo $name; ?>"><?php echo $label; ?>:</label>
            </div>
            <input type="file"
                   id="<?php echo $name; ?>" name="<?php echo $name; ?>" accept="image/*"
                   required>
            <div class="validation-error-block">
                <p class="js-validation-message"><?php echo $validationMessage; ?></p>
                <?php if (!$isValid && isset($_POST['confirm'])) {
                    echo "<p>".$validationMessage."</p>";
                } ?>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    /**
     * Print a CSRF token input.
     *
     * @param string $token The CSRF token value.
     *
     * @return string The HTML for the CSRF token input.
     */
    public static function printCsrfTokenInput($token)
    {
        ob_start();
        ?>
        <input type="hidden" name="csrf-token" value="<?php echo htmlspecialchars($token); ?>">
        <?php
        return ob_get_clean();
    }
}
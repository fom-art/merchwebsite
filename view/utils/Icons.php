<?php

/**
 * Class Icons
 *
 * This class defines methods to print different icons with links.
 */
class Icons
{
    /**
     * Print an admin icon.
     *
     * @param string $href The URL to link to.
     * @param string $id   The ID attribute for the link.
     */
    public static function printAdminIcon($href, $id): void
    {
        echo '<div class="icon-block">
                <a href="' . $href . '" id="' . $id . '" >
                <svg viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </a>
                        </div>';
    }

    /**
     * Print a user login icon.
     *
     * @param string $href The URL to link to.
     * @param string $id   The ID attribute for the link.
     */
    public static function printUserLoginIcon($href, $id): void
    {
        echo '<div class="icon-block">
                <a href="' . $href . '" id="' . $id . '" >
                <svg id="log-in-svg">
                  <title>Log in</title>
                  <defs>
                      <clipPath>
                          <circle cx="15" cy="15" r="14"/>
                      </clipPath>
                      <clipPath>
                          <rect width="100%" height="498"/>
                      </clipPath>
                  </defs>
                  <circle cx="15" cy="15" r="14" fill="black"/>
                  <circle cx="15" cy="12" r="6"/>
                  <circle cx="15" cy="28" r="10"/>
              </svg>
              </a>
                        </div>';
    }

    /**
     * Print a purchase icon.
     *
     * @param string $href The URL to link to.
     * @param string $id   The ID attribute for the link.
     */
    public static function printPurchaseIcon($href, $id): void
    {
        echo '<div class="icon-block">
                <a href="' . $href . '" id="' . $id . '" >
                <svg viewBox="0 0 485.6 485.6">
                  <title>Make a purchase</title>
                   <g>
                            <g>
                                <path d="M237.35,170.5c2.8,3.5,8.1,3.5,10.8,0l44.3-56.3c3.6-4.5,0.3-11.1-5.4-11.1h-17.4V4.5c0-2.5-2-4.5-4.5-4.5h-44.8    c-2.5,0-4.5,2-4.5,4.5v98.6h-17.4c-5.7,0-9,6.6-5.4,11.1L237.35,170.5z"/>
                                <path d="M454.95,198.7h-44.7l-55.4-148.4c-3.5-9.3-13.8-14-23.1-10.5c-9.3,3.5-14,13.8-10.5,23.1l50.8,135.9h-258.6l50.8-135.9    c3.5-9.3-1.2-19.6-10.5-23.1s-19.6,1.2-23.1,10.5l-55.5,148.4h-44.6c-14.5,0-26.3,11.8-26.3,26.3v43.7c0,14.5,11.8,26.3,26.3,26.3    h19.5l31.1,158.7c3.7,17.8,20.9,31.9,38.7,31.9h11.7h76.7c7.4,0,17,0,26.8,0l0,0h14.1l0,0c10.3,0,20.4,0,28.2,0h76.7h11.7    c17.8,0,35-14.1,38.7-31.9l31.1-158.7h19.5c14.5,0,26.3-11.8,26.3-26.3V225C481.35,210.5,469.55,198.7,454.95,198.7z     M176.85,357.5v68.8c0,9.8-8,17.2-17.2,17.2c-9.8,0-17.2-8-17.2-17.2v-28.8V330c0-9.8,8-17.2,17.2-17.2c9.8,0,17.2,8,17.2,17.2    V357.5z M232.15,357.5v68.8c0,9.8-8,17.2-17.2,17.2c-9.8,0-17.2-8-17.2-17.2v-28.8V330c0-9.8,8-17.2,17.2-17.2s17.2,8,17.2,17.2    V357.5z M287.75,397.4v28.8c0,9.2-7.4,17.2-17.2,17.2c-9.2,0-17.2-7.4-17.2-17.2v-68.8v-27.6c0-9.2,8-17.2,17.2-17.2    s17.2,7.4,17.2,17.2V397.4z M342.95,397.4v28.8c0,9.2-7.4,17.2-17.2,17.2c-9.2,0-17.2-7.4-17.2-17.2v-68.8v-27.6    c0-9.2,7.4-17.2,17.2-17.2c9.2,0,17.2,7.4,17.2,17.2V397.4z"/>
                            </g>
                        </g>
              </svg>
              </a>
                        </div>';
    }

    /**
     * Print a back arrow icon.
     *
     * @param string $href The URL to link to.
     * @param string $id   The ID attribute for the link.
     */
    public static function printBackArrowIcon($href, $id): void
    {
        echo '
<div class="icon-block">
                <a href="' . $href . '" id="' . $id . '" >
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <title>Exit</title>
            <path d="M0 0h48v48h-48z" fill="none"/>
            <path d="M40 22h-24.34l11.17-11.17-2.83-2.83-16 16 16 16 2.83-2.83-11.17-11.17h24.34v-4z"/>
        </svg>
              </a>
                        </div>';
    }
}
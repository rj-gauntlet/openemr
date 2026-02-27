<?php
/**
 * AgentForge Clinical Assistant - UI Wrapper
 *
 * This file embeds the standalone Streamlit Assistant UI directly into the OpenEMR 
 * interface using a responsive iframe. 
 *
 * @package   OpenEMR
 * @link      http://www.open-emr.org
 * @author    AgentForge Team
 */

require_once("../globals.php");
require_once("$srcdir/api.inc.php");
require_once("$srcdir/options.inc.php");

use OpenEMR\Core\Header;

// Ensure only authorized users can access the AI assistant
// if (!acl_check('patients', 'med')) {
//     die("Not Authorized");
// }

// In production, this URL should be updated to point to the secure internal server 
// hosting the AgentForge FastAPI/React microservice, rather than the public MVP URL.
$assistant_url = "https://agentforge.up.railway.app";
?>
<html>
<head>
    <?php Header::setupHeader(); ?>
    <title>AgentForge Clinical Assistant</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: #FFFFFF; /* Matches React Clinical Theme */
        }
        #agentforge-iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
        }
    </style>
</head>
<body>
    <iframe id="agentforge-iframe" src="<?php echo htmlspecialchars($assistant_url, ENT_QUOTES, 'UTF-8'); ?>" allow="microphone">
        Your browser does not support iframes. Please update your browser to use the AgentForge Clinical Assistant.
    </iframe>
</body>
</html>
<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

/** @var \Mautic\LeadBundle\Entity\Lead $lead */
/** @var array $fields */
/** @var string $callbacks */

$view->extend('MauticCoreBundle:Default:content.html.php');
?>
<h1>
    Failed callbacks for phone number: <?= $lead->getMobile() ?>
</h1>
<br>
<pre id="json"><?= $callbacks ?></pre>
<script>
  (function() {
    var element = document.getElementById("json");
    var obj = JSON.parse(element.innerText);
    element.innerHTML = JSON.stringify(obj, undefined, 2);
  })();
</script>
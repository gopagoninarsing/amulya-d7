<?php

/**
 * @file
 * Default theme implementation to display a printer-friendly version page.
 *
 * This file is akin to Drupal's page.tpl.php template. The contents being
 * displayed are all included in the $content variable, while the rest of the
 * template focuses on positioning and theming the other page elements.
 *
 * All the variables available in the page.tpl.php template should also be
 * available in this template. In addition to those, the following variables
 * defined by the print module(s) are available:
 *
 * Arguments to the theme call:
 * - $node: The node object. For node content, this is a normal node object.
 *   For system-generated pages, this contains usually only the title, path
 *   and content elements.
 * - $format: The output format being used ('html' for the Web version, 'mail'
 *   for the send by email, 'pdf' for the PDF version, etc.).
 * - $expand_css: TRUE if the CSS used in the file should be provided as text
 *   instead of a list of @include directives.
 * - $message: The message included in the send by email version with the
 *   text provided by the sender of the email.
 *
 * Variables created in the preprocess stage:
 * - $print_logo: the image tag with the configured logo image.
 * - $content: the rendered HTML of the node content.
 * - $scripts: the HTML used to include the JavaScript files in the page head.
 * - $footer_scripts: the HTML  to include the JavaScript files in the page
 *   footer.
 * - $sourceurl_enabled: TRUE if the source URL infromation should be
 *   displayed.
 * - $url: absolute URL of the original source page.
 * - $source_url: absolute URL of the original source page, either as an alias
 *   or as a system path, as configured by the user.
 * - $cid: comment ID of the node being displayed.
 * - $print_title: the title of the page.
 * - $head: HTML contents of the head tag, provided by drupal_get_html_head().
 * - $robots_meta: meta tag with the configured robots directives.
 * - $css: the syle tags contaning the list of include directives or the full
 *   text of the files for inline CSS use.
 * - $sendtoprinter: depending on configuration, this is the script tag
 *   including the JavaScript to send the page to the printer and to close the
 *   window afterwards.
 *
 * print[--format][--node--content-type[--nodeid]].tpl.php
 *
 * The following suggestions can be used:
 * 1. print--format--node--content-type--nodeid.tpl.php
 * 2. print--format--node--content-type.tpl.php
 * 3. print--format.tpl.php
 * 4. print--node--content-type--nodeid.tpl.php
 * 5. print--node--content-type.tpl.php
 * 6. print.tpl.php
 *
 * Where format is the ouput format being used, content-type is the node's
 * content type and nodeid is the node's identifier (nid).
 *
 * @see print_preprocess_print()
 * @see theme_print_published
 * @see theme_print_breadcrumb
 * @see theme_print_footer
 * @see theme_print_sourceurl
 * @see theme_print_url_list
 * @see page.tpl.php
 * @ingroup print
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>">
  <head>
    <?php print $scripts; ?>
    <?php if (isset($sendtoprinter)) print $sendtoprinter; ?>
    <?php print $css; ?>
  </head>
  <body>
    <div>
       <div style ="text-align:center;"><p><h3>Dr. S.V. Kameswari Clinic</h3></p> </div>

       <div style ="text-align:center; font-size:13px;margin-bottom:5px;">
         <div>H.NO. 11-10-16/A, AMAR PREMALAYAM, Road No 2, SBI COLONY, Kothpet , HYD-500035</div>
         <div>PHONE: 040-24056984, 9542727674</div>
       </div>
       <div style="clear:both"></div>

    <div class = 'bill-wrapper' style="border: 1px dotted;padding-left: 20px;padding-bottom: 20px;width: 650px; font-size:15px;">
       <div class = 'wrapper'>
        <p>
          <div style="float:left; width:450px;"><b>Bill Date :</b> <span><?php print date('d-m-Y', strtotime($node->field_bill_date['und'][0]['value'])); ?></span></div>
          <div  style="float:left"><b>Bill Number :</b> <span><?php print $node->field_bill_number['und'][0]['value']; ?></span></div>
        </p>
        </div>
       <div style="clear:both"></div>
       <div class = 'wrapper'>
          <p>
            <div style="float:left; width:350px;"><b>Patient Name:</b> <span><?php print $node->field_patient_name['und'][0]['value']; ?></span></div>
            <div  style="float:left; width:100px; "><b>Age</b> <span><?php print $node->field_age['und'][0]['value']; ?></span></div>
            <div  style="float:left;"><b>Mobile</b> <span><?php print $node->field_patient_mobile['und'][0]['value']; ?></span></div>
          </p>
          </div>
       <div style="clear:both"></div>
       ---------------------------------------------------------------------------------------------------------------------------------
       <div style="clear:both"></div>
       <table style="width:650px;border-collapse: unset;">
         <tr><td><b>Sno</b></td><td><b>Investigation</b></td><td><b>Qty</b></td><td><b>Rate</b></td> </tr>
        <?php $lists = bill_investigation_lists($node->nid);?>
        <?php $count = 1; foreach($lists as $list) { ?>
        <tr><td><?php print $count++; ?></td>
            <td><?php print $list['service']; ?></td>
            <td><?php print $list['qty']; ?> </td>
            <td><?php print $list['total']; ?></td>
        </tr>
	       <?php } ?>
        </table>
        <div style="clear:both"></div>
       ---------------------------------------------------------------------------------------------------------------------------------
       <div style="clear:both"></div>

       <div class = 'wrapper'>
        <p>
          <div style="float:left; width:450px;"><b>Total Amount:</b> <span>Rs: <?php print $node->field_bill_total['und'][0]['value']; ?>/-</span></div>
          <div  style="float:left"><b>Paid Amount :</b> <span>Rs: <?php print $node->field_total_paid['und'][0]['value']; ?>/-</span></div>
        </p>
          </div>
       <div style="clear:both"></div>
       <div class = 'wrapper'>

           <div style="float:left;    margin-left: 450px;"><b>Balance :</b> <span>Rs: <?php print ($node->field_bill_total['und'][0]['value'] - $node->field_total_paid['und'][0]['value']); ?>/-</span></div>

         </div>

       <div style="clear:both"></div>

       <div class = 'wrapper'>
        <p>
          <div style="float:left; "><b>Amount In Words :</b> <span>Rs:
            <?php print numberTowords($node->field_bill_total['und'][0]['value']); ?> only/-</span></div>
        </p>
        </div>

       <div style="clear:both"></div>

       <div class = 'wrapper'>
          <p>
            <div style="float:left;    margin-left: 500px;">Authorised Signature<span></div>
          </p>
        </div>

       <div style="clear:both"></div>
       <div class = 'wrapper'>
          <div style="float:left;    margin-left: 540px;font-size:13px;"><i>B.Madhavi<span></i></div>
        </div>
        <div style="clear:both"></div>
     </div>


  </div>

  </body>
</html>

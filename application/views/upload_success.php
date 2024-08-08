<html>
<head>
<title>Upload Success</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<h3>OCR Result:</h3>
<p><?php print "<pre>"; print_r($ocr_result); print "</pre>"; ?></p>

<p><?php echo anchor('MeterReading', 'Upload Another File!'); ?></p>

</body>
</html>

This index.php is completely self contained and designed to give you a quick and easy way to display your photos. Simply place the photos in a directory and drop index.php in the same directory. Apart from the exception below, no other ancillary files are required.

It doesn't do anything clever making thumbnails, it simply downloads the whole pictures but displays them small. This can sometimes be slow, depending on your connection but it does have the advantage of being very quick when you wish so see the large version of the picture. It is up to you to keep your photo files small enough to download in a reasonable time.

It currently only displays .jpg files but it is simple to modify it to display other file types as well.

If you have other subdirectories in your main directory it will display these as icons and if you wish to display the contents of those directories just make another copy of index.php in the subdirectory. Separating photos into subdirectories is one way to speed things up as all the photos don't get downloaded at once.

Please leave the footer copyright message if you chose to modify the code.

If your web server doesn't support index.php as a default index page create a file index.html containing the following:

<!-- If you are viewing in raw mode copy and paste this section
<html>
<head>
<script type="text/javascript">
  self.location="index.php";
</script>
</head>
<body>
 You should not see this..
</body>
</html>
-->

&lt;html&gt;<br>
&lt;head&gt;<br>
&lt;script type="text/javascript"&gt;<br>
  self.location="index.php";<br>
&lt;/script&gt;<br>
&lt;/head&gt;<br>
&lt;body&gt;<br>
 You should not see this..<br>
&lt;/body&gt;<br>
&lt;/html&gt;<br>

Any web browser supporting javascript should then display the index.php instead.

This index.php is designed to give you a quick and easy way to display your photos. Simply place the photos in a directory and drop index.php in the same directory.It is completely self contained.

It doesn't do anything clever making thumbnails is simply downloads the whole pictures but displays them small. This can sometimes be slow, depending on your connection but it does have the advantage of being very quick when you wish so see the large version of the picture.

It currently only displays .jpg files but it is simple to modify it to display other file types as well.

If you have other subdirectories in your main directory it will display these as icons and if you wish to display the contents of those directories just make another copy of index.php in the subdirectory.

Please leave the footer copyright message if you chose to modify the code.

If your web server doesn't support index.php as a default index page create a file index.html containing the following:

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

Any web browser supporting javascript should then display the index.php instead.

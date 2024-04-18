<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="route('insertarProduct')" method="post">
    @csrf
      <input type="text" name="code">
      <input type="text" name="name">
      <input type="number" name="quantity">
      <input type="float" name="price">
      <input type="text" name="description">
      <input type="submit" value="mandar">
  </form>
</body>
</html>
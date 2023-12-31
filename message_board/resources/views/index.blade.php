<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>留言板</title>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="./script.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">
  <link rel="stylesheet" href="./style.css">
</head>
<!-- 預期成效，在首頁上輸入暱稱及留言並按下傳送後，會新增到api，並且透過js自動抓取api並生成留言區 -->
<body>
  <div class="navbar navbar-expand-lg navbar-dark bg-primary">
    <nav class="container">
      <span class="navbar-brand mb-0 h1">留言板</span>
    </nav>
  </div>
  <div class="container">
    <form class="add-comment-form mt-4 mb-4">
      <div class="form-group">
        <label for="nickname">暱稱</label>
        <input class="form-control" name="nickname" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="content-textarea">留言</label>
        <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">發送</button>
    </form>
    <div class="comments"></div>
  </div>
</body>
</html>
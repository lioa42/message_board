<?php
  header('Content-type:application/json;charset=utf-8');
  header('Access-Control-Allow-Origin: *');

  if (empty($_GET['site_key'])) {
    $json = [
      'ok' => false, 
      'message' => 'Please send site_key in url'
    ];
    $response = json_encode($json);
    echo $response;
    die();
  }
  $siteKey = $_GET['site_key'];

  $stmt->bind_param('s', $siteKey);
  $result = $stmt->execute();
  if(!$result) {
    $json = [
      'ok' => false, 
      'message' => $conn->error
    ];
    $response = json_encode($json);
    echo $response;
    die();
  }

  $result = $stmt->get_result();
  $discussion = [];
  while ($row = $result->fetch_assoc()) {
    array_push($discussion, [
      'nickname' => $row['nickname'],
      'content' => $row['content'],
      'created_at' => $row['created_at'],
      'id' => $row['id']
    ]);
  }

  $json = [
    'ok' => true, 
    'discussion' => $discussion
  ];
  $response = json_encode($json);
  echo $response;
?>
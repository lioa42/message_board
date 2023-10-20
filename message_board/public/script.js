const APIUrl = 'http://localhost:8080/message_board';

function encodeHTML(s) {
  return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;');
}

function addComment(commentsDOM) {
  const nickname = $('input[name=nickname]').val();
  const content = $('textarea[name=content]').val();
  const remindMsg = '<div class="alert alert-danger mt-5" role="alert">Please complete both nickname and content!</div>';

  if (nickname === '' || content === '') {
    $('.alert').remove();
    $('.main').prepend(remindMsg);
    return;
  }

  const newComment = {
    site_key: 'john',
    nickname,
    content,
  };

  $.ajax({
    type: 'POST',
    url: `${APIUrl}/add_comments_api.php`,
    data: newComment,
  })
    .done((data) => {
      newComment.created_at = data.created_at;
      appendCommentToDOM(commentsDOM, newComment, true);
      $('.form-control').val('');
      $('.alert').remove();
    })
    .fail(err => console.log(err));
}

function appendCommentToDOM(container, comment, isPrepend) {
  const html = `
    <div class="card m-2">
      <div class="card-body">
        <div class="card-top d-flex">
          <h5 class="card-title"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;${encodeHTML(comment.nickname)}</h5>
          <p class="card-text time">${comment.created_at}</p>
        </div>
        <p class="card-text content">${encodeHTML(comment.content)}</p>
        <input hidden value="${comment.id}"/>
      </div>
    </div>`;
  if (isPrepend) {
    container.prepend(html);
  } else {
    container.append(html);
  }
}

function getCommentsAPI(cb) {
  let url = `${APIUrl}/api_comments.php?site_key=john`;
  $.ajax({ url })
    .done(data => cb(data))
    .fail(err => console.log(err));
}

function getComments(commentsDOM) {
  getCommentsAPI((data) => {
    if (!data.ok) {
      return;
    }
    const comments = data.discussion;
    for (let i = 0; i < comments.length; i += 1) {
      appendCommentToDOM(commentsDOM, comments[i]);
    }
  });
}


$(document).ready(() => {
  const commentsDOM = $('.comments');
  getComments(commentsDOM);

  $('.add-comment-form').submit((e) => {
    e.preventDefault();
    addComment(commentsDOM);
  });
});
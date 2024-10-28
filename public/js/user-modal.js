// ユーザーの削除用フォーム
const deleteUserForm = document.forms.deleteUserForm;

// 削除の確認メッセージ
const deleteMessage = document.getElementById('deleteUserModalLabel');

// タグの削除用モーダルを開くときの処理
document.getElementById('deleteUserModal').addEventListener('show.bs.modal', (event) => {
  let deleteButton = event.relatedTarget;
  let categoryId = deleteButton.dataset.useId;
  let categoryName = deleteButton.dataset.userName;

  deleteCategoryForm.action = `users/${useId}`;
  deleteMessage.textContent = `「${userName}」を削除してもよろしいですか？`
});


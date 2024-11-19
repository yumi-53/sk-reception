document.addEventListener('DOMContentLoaded', (event) => {
  // ユーザーの削除用フォーム
  const deleteUserForm = document.forms.deleteUserForm;

  // 削除の確認メッセージ
  const deleteMessage = document.getElementById('deleteUserModalLabel');

  // モーダルを開くときの処理
  document.getElementById('deleteUserModal').addEventListener('show.bs.modal', (event) => {
      let deleteButton = event.relatedTarget;
      let userId = deleteButton.dataset.userId;
      let userName = deleteButton.dataset.userName;

      deleteUserForm.action = `/sk-reception/public/admin/users/${userId}`;
      deleteMessage.textContent = `「${userName}」様を削除してもよろしいですか？`;
  });
});

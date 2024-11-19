document.addEventListener('DOMContentLoaded', (event) => {
    // 受付取消用フォーム
    const cancelReceptionForm = document.forms.cancelReceptionForm;
    // 取消の確認メッセージ
    const cancelMessage = document.getElementById('cancelReceptionModalLabel');

  // 受付取消用モーダルを開くときの処理
    document.getElementById('cancelReceptionModal').addEventListener('show.bs.modal', (event) => {
        let cancelButton = event.relatedTarget;
        let receptionId = cancelButton.dataset.receptionId;
        let receptionName = cancelButton.dataset.receptionName;
        console.log(receptionId);
        console.log(receptionName);

        cancelReceptionForm.action = `reception/${receptionId}`;
        cancelMessage.textContent = `「${receptionName}」様の受付を取消してもよろしいですか？`
    });
});
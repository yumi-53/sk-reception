document.addEventListener('DOMContentLoaded', (event) => {
    // 受付登録用フォーム
    const createReceptionForm = document.forms.createReceptionForm;
    // 取消の確認メッセージ
    const cleateMessage = document.getElementById('createReceptionModalLabel');


    // 受付取消用フォーム
    const cancelReceptionForm = document.forms.cancelReceptionForm;
    // 取消の確認メッセージ
    const cancelMessage = document.getElementById('cancelReceptionModalLabel');



    // 受付登録用モーダルを開くときの処理
    document.getElementById('createReceptionModal').addEventListener('show.bs.modal', (event) => {
        let createButton = event.relatedTarget;
        let createReceptionId = createButton.dataset.receptionId;
        let createReceptionName = createButton.dataset.receptionName;
        console.log(createReceptionId);
        console.log(createReceptionName);
        
        createReceptionForm.user_id.value = createReceptionId;
        cleateMessage.textContent = `「${createReceptionName}」様の受付をしてもよろしいですか？`
    });


  // 受付取消用モーダルを開くときの処理
    document.getElementById('cancelReceptionModal').addEventListener('show.bs.modal', (event) => {
        let cancelButton = event.relatedTarget;
        let receptionId = cancelButton.dataset.receptionId;
        let receptionName = cancelButton.dataset.receptionName;

        cancelReceptionForm.action = `reception/${receptionId}`;
        cancelMessage.textContent = `「${receptionName}」様の受付を取消してもよろしいですか？`
    });
});
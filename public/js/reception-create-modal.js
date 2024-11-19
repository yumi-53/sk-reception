document.addEventListener('DOMContentLoaded', (event) => {
    // 受付登録用フォーム
    const createReceptionForm = document.forms.createReceptionForm;
    // 取消の確認メッセージ
    const cleateMessage = document.getElementById('createReceptionModalLabel');

    // 受付登録用モーダルを開くときの処理
    document.getElementById('createReceptionModal').addEventListener('show.bs.modal', (event) => {
        let createButton = event.relatedTarget;
        let createReceptionId = createButton.dataset.receptionId;
        let createReceptionName = createButton.dataset.receptionName;
        // console.log(createReceptionId);
        // console.log(createReceptionName);
        
        createReceptionForm.user_id.value = createReceptionId;
        cleateMessage.textContent = `「${createReceptionName}」様の受付をしてもよろしいですか？`
    });
});
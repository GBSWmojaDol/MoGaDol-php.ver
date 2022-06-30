function CheckInfo() {
    let id = document.querySelector('[name="create_id"]');
    let pw = document.querySelector('[name="create_pw"]');
    let pw_chk = document.querySelector('[name="pwchk"]');
    let nkname = document.querySelector('[name="nickname"]');
    let addr = document.querySelector('[name="addr1"]');
    let addr2 = document.querySelector('[name="addr2"]');
    
    if(id.value === ""){
        alert("아이디를 입력해주세요");
        id.focus();
        return false;
    }else if(pw.value === ""){
        alert("비밀번호를 입력해주세요");
        pw.focus();
        return false;
    }else if(pw_chk.value === ""){
        alert("비밀번호를 확인해주세요");
        pw_chk.focus();
        return false;
    }else if(nkname.value === ""){
        alert("닉네임을 확인해주세요");
        nkname.focus();
        return false;
    }else if(addr.value === ""){
        alert("주소를 확인해주세요");
        addr.focus();
        return false;
    }else if(addr2.value === ""){
        alert("상세주소를 확인해주세요");
        addr2.focus();
        return false;
    }




    else {
        if (pw.value !== pw_chk.value) {
            alert("비밀번호와 비밀번호 확인이 다릅니다. 다시 한 번 확인해주세요.");
            pw_chk.focus();
            return false;
        } else {
            return true;
        }
    }
}

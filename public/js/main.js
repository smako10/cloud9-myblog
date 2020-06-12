(function() {
    'use strict';
    
    const cmds = document.getElementsByClassName('del');
    let i;
    
    for (i = 0; i < cmds.length; i++) {
        cmds[i].addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('are you sure?')) {
                document.getElementById('form_' + this.dataset.id).submit();
            }
        });
    }
})();
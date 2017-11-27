

$.extend(String.prototype, {
    stripTags: function(allowed) {
        allowed = (((allowed || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
        var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi;
        var commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
        return this.replace(commentsAndPhpTags, '').replace(tags, function($0, $1) {
            return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
        });
    },
    truncate: function(length, truncation) {
        truncation = truncation ? truncation : '...';

        if (typeof (length) == 'string') {
            truncation = length;
            length = 20;
        }

        return this.length > length ? this.slice(0, length - truncation.length) + truncation : String(this);
    },
    blank: function() {
        return /^\s*$/.test(this || ' ');
    },
    empty: function() {
        return this === '';
    },
    left: function(n) {
        if (n <= 0)
            return '';
        else
        if (n > this.length)
            return this;
        else
            return this.substring(0, n);
    },
    right: function(n) {
        if (n <= 0)
            return '';
        else
        if (n > this.length)
            return this;
        else {
            var iLen = this.length;
            return this.substring(iLen, iLen - n);
        }
    },
    mid: function(star, n) {
        return n ? this.substr(star, n) : this.substr(star);
    },
    getAS: function(s) {
        return this.substr(0, this.search(s));
    },
    getBS: function(s) {
        return this.substr(this.search(s) + 1);
    },
    trim: function() {
        var reg = new RegExp('(^(\\s|' + String.fromCharCode(12288) + ')*)|((\\s|' + String.fromCharCode(12288) + ')*$)', 'g');
        return this.replace(reg, '');
    },
    getNum: function() {
        var nums = '0123456789';
        var result = '';
        for (var i = 0; i < this.length; i++)
            if (nums.indexOf(this.charAt(i)) >= 0)
                result += this.charAt(i);
        return parseInt(result, 10);
    },
    slug: function() {
        var str = this.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, '-').replace(/-+-/g, '-').replace(/^\-+|\-+$/g, '').toLowerCase();
        var from = 'àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđñç';
        var to = 'aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydnc';

        for (var i = 0, l = from.length; i < l; i++) {
            str = str.replace(new RegExp(from[i], 'g'), to[i]);
        }

        return str;
    },
    countWords: function() {
        return this.stripTags().trim().split(/\s+/).length;
    },
    ucFirst: function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }
});

$.extend(Array.prototype, {
    blank: function() {
        return (this.length === 0);
    },
    empty: function() {
        for (var i = 0; i <= this.length; i++) {
            this.shift();
        }
    },
    removeDuplicates: function(interator) {
        for (var i = 0; i < this.length; i++) {
            for (var j = this.length - 1; j > i; j--) {
                if ((interator && interator(this[i], this[j])) || this[i] == this[j]) {
                    this.splice(j, 1);
                }
            }
        }
    },
    swap: function(i, j) {
        var temp = this[i];
        this[i] = this[j];
        this[j] = temp;
    },
    inArray: function(value) {
        return this.indexOf(value) > -1;
    }
});

var Frontend = {
    loadDataAjax: function() {
        $(document).on('change', 'select.load-ajax', function() {
            var val = $(this).val();
            var href = $(this).data('href');
            href = href.replace('/0', '/' + val);
            var select = $(this).data('for');

            $.ajax({
                url: href,
                method: 'get',
                success: function(response) {
                    if (response.error == 0) {
                        $(select).children(':gt(1)').remove();
                        var id = $(select).data('id');

                        if (response.html != '') {
                            $(select)
                                .append(response.html)
                                .trigger('change');
                        }
                    }
                }
            });
        });
    }
};
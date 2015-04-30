/**************************************\
 |*  cssAnimate 1.1.1 for jQuery       *|
 |*  (c) 2011 - Clemens Damke          *|
 |*  Licensed under MIT License        *|
 |*  Based and tested on jQuery 1.6.4  *|
 \**************************************/
(function (a) {
    var b = ["Webkit", "Moz", "O", "Ms", "Khtml", ""];
    a.fn.cssSetQueue = function (b, c) {
        v = this;
        var d = v.data("cssQueue") ? v.data("cssQueue") : [];
        var e = v.data("cssCall") ? v.data("cssCall") : [];
        var f = 0;
        var g = {};
        a.each(c, function (a, b) {
            g[a] = b
        });
        while (1) {
            if (!e[f]) {
                e[f] = g.complete;
                break
            }
            f++
        }
        g.complete = f;
        d.push([b, g]);
        v.data({cssQueue: d, cssRunning: true, cssCall: e})
    };
    a.fn.cssRunQueue = function () {
        v = this;
        var a = v.data("cssQueue") ? v.data("cssQueue") : [];
        if (a[0])v.cssEngine(a[0][0], a[0][1]); else v.data("cssRunning", false);
        a.shift();
        v.data("cssQueue", a)
    };
    a.cssMerge = function (b, c, d) {
        a.each(c, function (c, e) {
            a.each(d, function (a, d) {
                b[d + c] = e
            })
        });
        return b
    };
    a.fn.cssAnimationData = function (a, b) {
        var c = this;
        var d = c.data("cssAnimations");
        if (!d)d = {};
        if (!d[a])d[a] = [];
        d[a].push(b);
        c.data("cssAnimations", d);
        return d[a]
    };
    a.fn.cssAnimationRemove = function () {
        var b = this;
        var c = b.data("cssAnimations");
        var d = b.data("identity");
        a.each(c, function (a, b) {
            c[a] = b.splice(d + 1, 1)
        });
        b.data("cssAnimations", c)
    };
    a.css3D = function (c) {
        a("body").data("cssPerspective", isFinite(c) ? c : c ? 1e3 : 0).css(a.cssMerge({}, {TransformStyle: c ? "preserve-3d" : "flat"}, b))
    };
    a.cssAnimateSupport = function () {
        var c = false;
        a.each(b, function (a, b) {
            c = document.body.style[b + "AnimationName"] !== undefined ? true : c
        });
        return c
    };
    a.fn.cssEngine = function (c, d) {
        function f(a) {
            return String(a).replace(/([A-Z])/g, "-$1").toLowerCase()
        }

        var e = this;
        if (typeof d.complete == "number")e.data("cssCallIndex", d.complete);
        var g = {linear: "linear", swing: "ease", easeIn: "ease-in", easeOut: "ease-out", easeInOut: "ease-in-out"};
        var h = {};
        var i = a("body").data("cssPerspective");
        if (c.transform)a.each(b, function (a, b) {
            var d = b + (b ? "T" : "t") + "ransform";
            var g = e.css(f(d));
            var j = c.transform;
            if (!g || g == "none")h[d] = "scale(1)";
            c[d] = (i && !/perspective/gi.test(j) ? "perspective(" + i + ") " : "") + j
        });
        if (c.borderRadius)a.each(b, function (a, b) {
            c[b + (b ? "B" : "b") + "orderRadius"] = c.borderRadius
        });
        if (c.boxShadow)a.each(b, function (a, b) {
            c[b + (b ? "B" : "b") + "oxShadow"] = c.boxShadow
        });
        var j = [];
        a.each(c, function (a, b) {
            j.push(f(a))
        });
        var k = false;
        var l = [];
        var m = [];
        for (var n = 0; n < j.length; n++) {
            l.push(String(d.duration / 1e3) + "s");
            m.push(g[d.easing])
        }
        l = e.cssAnimationData("dur", l.join(", ")).join(", ");
        m = e.cssAnimationData("eas", m.join(", ")).join(", ");
        var o = e.cssAnimationData("prop", j.join(", "));
        e.data("identity", o.length - 1);
        o = o.join(", ");
        var p = {TransitionDuration: l, TransitionProperty: o, TransitionTimingFunction: m};
        var q = {};
        q = a.cssMerge(q, p, b);
        var r = c;
        a.extend(q, c);
        if (q.display == "callbackHide")k = true; else if (q.display)h["display"] = q.display;
        e.css(h);
        setTimeout(function () {
            e.css(q);
            var b = e.data("runningCSS");
            b = !b ? r : a.extend(b, r);
            e.data("runningCSS", b);
            setTimeout(function () {
                e.data("cssCallIndex", "a");
                if (k)e.css("display", "none");
                e.cssAnimationRemove();
                if (d.queue)e.cssRunQueue();
                if (typeof d.complete == "number") {
                    e.data("cssCall")[d.complete].call(e);
                    e.data("cssCall")[d.complete] = 0
                } else d.complete.call(e)
            }, d.duration)
        }, 0)
    };
    a.str2Speed = function (a) {
        return isNaN(a) ? a == "slow" ? 1e3 : a == "fast" ? 200 : 600 : a
    };
    a.fn.cssAnimate = function (b, c, d, e) {
        var f = this;
        var g = {
            duration: 0, easing: "swing", complete: function () {
            }, queue: true
        };
        var h = {};
        h = typeof c == "object" ? c : {duration: c};
        h[d ? typeof d == "function" ? "complete" : "easing" : 0] = d;
        h[e ? "complete" : 0] = e;
        h.duration = a.str2Speed(h.duration);
        a.extend(g, h);
        if (a.cssAnimateSupport()) {
            f.each(function (c, d) {
                d = a(d);
                if (g.queue) {
                    var e = !d.data("cssRunning");
                    d.cssSetQueue(b, g);
                    if (e)d.cssRunQueue()
                } else d.cssEngine(b, g)
            })
        } else f.animate(b, g);
        return f
    };
    a.cssPresetOptGen = function (a, b) {
        var c = {};
        c[a ? typeof a == "function" ? "complete" : "easing" : 0] = a;
        c[b ? "complete" : 0] = b;
        return c
    };
    a.fn.cssFadeTo = function (b, c, d, e) {
        var f = this;
        opt = a.cssPresetOptGen(d, e);
        var g = {opacity: c};
        opt.duration = b;
        if (a.cssAnimateSupport()) {
            f.each(function (b, d) {
                d = a(d);
                if (d.data("displayOriginal") != d.css("display") && d.css("display") != "none")d.data("displayOriginal", d.css("display") ? d.css("display") : "block"); else d.data("displayOriginal", "block");
                g.display = c ? d.data("displayOriginal") : "callbackHide";
                d.cssAnimate(g, opt)
            })
        } else f.fadeTo(b, opt);
        return f
    };
    a.fn.cssFadeOut = function (b, c, d) {
        if (a.cssAnimateSupport()) {
            if (!this.css("opacity"))this.css("opacity", 1);
            this.cssFadeTo(b, 0, c, d)
        } else this.fadeOut(b, c, d);
        return this
    };
    a.fn.cssFadeIn = function (b, c, d) {
        if (a.cssAnimateSupport()) {
            if (this.css("opacity"))this.css("opacity", 0);
            this.cssFadeTo(b, 1, c, d)
        } else this.fadeIn(b, c, d);
        return this
    };
    a.cssPx2Int = function (a) {
        return a.split("p")[0] * 1
    };
    a.fn.cssStop = function () {
        var c = this, d = 0;
        c.data("cssAnimations", false).each(function (f, g) {
            g = a(g);
            var h = {TransitionDuration: "0s"};
            var i = g.data("runningCSS");
            var j = {};
            if (i)a.each(i, function (b, c) {
                c = isFinite(a.cssPx2Int(c)) ? a.cssPx2Int(c) : c;
                var d = [0, 1];
                var e = {
                    color: ["#000", "#fff"],
                    background: ["#000", "#fff"],
                    "float": ["none", "left"],
                    clear: ["none", "left"],
                    border: ["none", "0px solid #fff"],
                    position: ["absolute", "relative"],
                    family: ["Arial", "Helvetica"],
                    display: ["none", "block"],
                    visibility: ["hidden", "visible"],
                    transform: ["translate(0,0)", "scale(1)"]
                };
                a.each(e, function (a, c) {
                    if ((new RegExp(a, "gi")).test(b))d = c
                });
                j[b] = d[0] != c ? d[0] : d[1]
            }); else i = {};
            h = a.cssMerge(j, h, b);
            g.css(h);
            setTimeout(function () {
                var b = a(c[d]);
                b.css(i).data({runningCSS: {}, cssAnimations: {}, cssQueue: [], cssRunning: false});
                if (typeof b.data("cssCallIndex") == "number")b.data("cssCall")[b.data("cssCallIndex")].call(b);
                b.data("cssCall", []);
                d++
            }, 0)
        });
        return c
    };
    a.fn.cssDelay = function (a) {
        return this.cssAnimate({}, a)
    }
})(jQuery)
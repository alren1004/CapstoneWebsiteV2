/* dCodes Framework: (c) Wizzud, TemplateAccess */
(function (g, Q) {
    if (!g.jqDock) {
        var A = ["Top", "Right", "Bottom", "Left"], R = ["Major", "Minor"], m = [], w = g.map("ed Item Mouse Label Filter Expand Wrap List ".split(" "), function (a, b) {
                m[b] = "jqDock" + a;
                return "." + m[b]
            }), o = ["JQDOCK", "JQDOCK_conv", "JQDOCK_li", "JQDOCK_list"], I = ["mouseenter", "mousemove", "mouseleave"], B = ["docknudge", "dockidle", "dockfreeze"], v = ["Idler", "Inactive", "Indock", "Overdock", "Offdock"], r = {
                v: {
                    wh: "height",
                    xy: 1,
                    tl: "top",
                    lead: 0,
                    trail: 2,
                    inv: "h"
                }, h: {wh: "width", xy: 0, tl: "left", lead: 3, trail: 1, inv: "v"}
            },
            J = [0, 0], C = Q.setTimeout, x = function (a) {
                return a.data(o[0])
            }, da = function () {
                return !1
            }, G = function (a) {
                return g(a).parent().children(w[1]).index(a)
            }, K = function (a, b, c, d) {
                var e = {}, f = r[c.inv].wh, d = !d || a[c.wh] > b;
                e[c.wh] = d ? b : a[c.wh];
                e[f] = d ? Math.round(b * a[f] / a[c.wh]) : a[f];
                return e
            }, y = function (a, b) {
                return g(a).closest(w[b || 0])
            }, S = function (a) {
                var b = {}, c, d;
                for (c in a)(d = c.match(/^jqdock([A-Z])([a-zA-Z]+)$/)) && (b[d[1].toLowerCase() + d[2]] = a[c]);
                return b
            }, E = function (a) {
                a = parseInt(a, 10);
                return isNaN(a) ? 0 : a
            }, z = function (a,
                             b) {
                for (var c = v[b] ? b + 1 : v.length; b < c && c--;)a[v[c]] && (Q.clearTimeout(a[v[c]]), a[v[c]] = null)
            }, T = function () {
                var a = g(this), b = a.attr("id") || "", c = a.data(o[1]), d = a.children("li").map(function () {
                    var a = g("img", this).eq(0), b = a.parent("a");
                    return b.length ? a.siblings().length ? null : b[0] : a.get(0)
                }), e = b ? {id: b} : {}, f;
                if (!a.length || !d.length)return this;
                if (c)return c;
                if (f = a.attr("style"))e.style = f;
                f = g("<div/>").addClass(m[7]).data("jqdock", g.extend({}, a.data("jqdock"), S(a.data()))).data(o[3], {
                    el: this,
                    attr: e
                });
                a.hide().removeAttr("id");
                d.each(function () {
                    g(this).data(o[2], g("<span/>").insertBefore(this)[0]).appendTo(f)
                });
                f.attr("id", b).insertBefore(a);
                a.data(o[1], f[0]);
                return f[0]
            }, L = function (a) {
                var b = g.now(), a = a ? a.Stamp + a.Opts.duration : 0;
                a > b && (b -= a - b);
                return b
            }, U = function (a) {
                var b = a.data, a = x(g(b.menu)), c, d;
                a && (c = a.Elem[b.idx], d = a.Opts, d.sizeMax ? g.extend(c, K(this, d.sizeMax, r[r[d.vh].inv]), d.capSizing) : (c.width = this.width, c.height = this.height), --a.Load || C(function () {
                    g.jqdock.init(b.menu)
                }, 0))
            }, V = function (a, b, c) {
                b.Item.toggleClass(m[5],
                    !c);
                a.Menu.trigger("dockitem", [b.Img[0], !c])
            }, ea = function () {
                g(this).prev("img").triggerHandler("click")
            }, D = function (a, b) {
                var c = a.Elem[a.Current];
                c && a.Opts.labels && c.Label.el.toggle(!!b)
            }, W = function (a) {
                var b = r[a.Opts.vh], c = -1, d = J[b.xy] - a.Elem[0].Item.offset()[b.tl], e, f, g, h;
                if (0 <= d)for (e = 0; 0 > c && e < a.ElCt; e++)f = a.Elem[e], g = f.Pad[b.lead] + f.Pad[b.trail], h = f.Major + g, d < h ? (e !== a.Current && (D(a), a.Current = e), c = f.Offset + d * (f.Initial + g) / h) : d -= h;
                return c
            }, X = function (a) {
                for (var b = a.childNodes.length, c; b;)c = a.childNodes[--b],
                    (c.childNodes || []).length ? X(c) : 3 === c.nodeType && a.removeChild(c)
            }, Y = function (a) {
                a.css({visibility: "visible"}).show()
            }, H = function (a) {
                var b = a.Opts.idle;
                b && (z(a, 0), a[v[0]] = C(function () {
                    a.Menu.trigger(B[1])
                }, b))
            }, M = function (a, b) {
                for (var c = a.Opts, d = r[c.vh].wh, e = a.ElCt, f, g, h, b = b || 0 === b ? b : W(a); e--;)f = a.Elem[e], h = f.Initial, 0 <= b && (g = Math.abs(b - f.Centre), g < c.distance && (h = f[d] - Math.round((f[d] - f.Initial) * Math.pow(g, c.coefficient) / c.attenuation)), e === a.Current && !c.noAntiFlutter && (g = [J[r[c.vh].xy], a.Current, h].join(),
                    g === a.ToFro[0] && h !== a.ToFro[2] ? h = a.ToFro[2] : a.ToFro = [a.ToFro[1], g, h])), f.Final = h
            }, fa = function (a) {
                return a
            }, $ = function (a, b, c, d) {
                var e = a.Elem[b], f = a.Opts, t = a.Yard, h = a.Border, l = r[f.vh], i = r[l.inv], k = f.labels, m = a.Elem[a.Current], s = e.src !== e.altsrc, q, n, u, j, p, Z;
                if (d || e.Major !== c) {
                    q = g.boxModel || "v" === f.vh ? 0 : h[l.lead] + h[l.trail];
                    !d && e.Major === e.Initial && (s && (e.Img[0].src = e.altsrc), V(a, e));
                    a.Spread += c - e.Major;
                    n = K(e, c, l);
                    u = f.size - n[i.wh];
                    p = {middle: 1, center: 1, top: 2, left: 2}[f.align] || 0;
                    1 < p ? n["margin" + A[i.trail]] =
                        u : p ? (j = Math.round(u * (100 - f.bias) / 100), n["margin" + A[i.lead]] = u - j, n["margin" + A[i.trail]] = j) : n["margin" + A[i.lead]] = u;
                    if (c !== e.Major || d && !b) {
                        if (f.flow)t.parent()[l.wh](a.Spread + h[l.lead] + h[l.trail]);
                        t[l.wh](a.Spread + q)
                    }
                    e.Wrap.css(n);
                    f.flow || t.css(l.tl, Math.floor(Math.max(0, (a[l.wh] - a.Spread) / 2)));
                    if (a.OnDock) {
                        if (m && k) {
                            b = m.Label;
                            f = b.el;
                            if (b.mc)for (p in b.mc = 0, r)for (Z in b[p] = f[r[p].wh](), {
                                lead: 1,
                                trail: 1
                            })b[p] += E(f.css("padding" + A[r[p][Z]]));
                            "m" === k.charAt(0) && f.css({top: Math.floor((m[R[i.xy]] - b.v) / 2)});
                            "c" === k.charAt(1) && f.css({left: Math.floor((m[R[l.xy]] - b.h) / 2)})
                        }
                        a.Stamp || D(a, 1)
                    }
                    e.Major = c;
                    e.Minor = n[i.wh];
                    !d && c === e.Initial && (s && (e.Img[0].src = e.src), V(a, e, 1))
                }
            }, N = function (a) {
                var b = a.Opts, c = r[b.vh], d = b.duration + b.step, e, f;
                a.Stamp && (d = L() - a.Stamp, d >= b.duration && (a.Stamp = 0));
                if (d >= b.step) {
                    f = (b.duration - d) / b.step;
                    for (b = 0; b < a.ElCt; b++)d = a.Elem[b], e = (e = d.Final - d.Major) && 1 < f ? d.Major + Math[0 > e ? "floor" : "ceil"](e / f) : d.Final, $(a, b, e);
                    a.Spread > a[c.wh] && (a.Yard.parent()[c.wh](a.Spread + a.Border[c.lead] + a.Border[c.trail]),
                        a[c.wh] = a.Spread)
                }
            }, O = function (a, b) {
                var c = a.Elem, d = c.length;
                z(a, 2);
                if (a.OnDock && !a.Stamp) {
                    for (M(a, b); d && c[d - 1].Major === c[d - 1].Final;)--d;
                    d ? (N(a), a[v[2]] = C(function () {
                        O(a, b)
                    }, a.Opts.step)) : D(a, 1)
                }
            }, aa = function (a, b) {
                var c = a.Elem, d = c.length;
                if (!a.OnDock) {
                    for (; d && c[d - 1].Major <= c[d - 1].Initial;)--d;
                    W(a);
                    if (d)N(a), a[v[4]] = C(function () {
                        aa(a, b)
                    }, a.Opts.step); else {
                        a.Stamp = 0;
                        for (d = c.length; d--;)c[d].Major = c[d].Final = c[d].Initial;
                        a.Current = -1;
                        b || H(a)
                    }
                }
            }, ba = function (a, b) {
                var c = a.Elem, d = c.length;
                if (a.OnDock) {
                    for (M(a,
                        b); d && c[d - 1].Major === c[d - 1].Final;)--d;
                    !d || !a.Stamp ? (a.Stamp = 0, O(a, b)) : (N(a), a[v[3]] = C(function () {
                        ba(a, b)
                    }, a.Opts.step))
                }
            }, F = function (a, b, c, d) {
                var e = b.Elem, f = e.length;
                0 === a && (b.OnDock = 1, 0 <= b.Current && b.Current !== c && D(b), b.Current = c, b.Stamp = d && 1 < d ? 0 : L(b), ba(b, d ? e[c].Centre : null));
                1 === a && (c !== b.Current && (D(b), b.Current = c), O(b));
                if (2 === a) {
                    z(b, 1);
                    b.OnDock = 0;
                    D(b);
                    for (b.Stamp = L(b); f--;)e[f].Final = e[f].Initial;
                    aa(b, !!d)
                }
            }, ca = function (a) {
                var b = x(y(this)), c = G(this), d = -1, e;
                b && (b.Asleep ? b.Opts.noBuffer || (b.Doze =
                {
                    El: this,
                    type: a.type,
                    pageX: a.pageX,
                    pageY: a.pageY
                }) : (e = b.OnDock, z(b, 0), J = [a.pageX, a.pageY], a.type === I[2] ? e ? d = 2 : H(b) : (b.Opts.inactivity && (z(b, 1), b[v[1]] = C(function () {
                    F(2, b, c, 1)
                }, b.Opts.inactivity)), a.type === I[1] ? 0 > c ? e && 0 <= b.Current && (d = 2) : d = !e || 0 > b.Current ? 0 : 1 : 0 <= c && !e && (d = 0)), b.Doze = null, 0 <= d && F(d, b, c)))
            }, P = function (a) {
                var b = g(this), c = x(b), d = a.type === B[2], e = d ? "freeze" : "sleep";
                if (c)if (a.type === B[0]) {
                    if (e = c.Frozen ? "thaw" : "wake", c.Asleep && (c.Asleep = !1 === c.Opts.onWake.call(this, e), c.Asleep || (c.Frozen = !b.trigger("dockwake", [e]))), !c.Asleep)H(c), (b = c.Doze) && ca.call(b.El, b)
                } else if (z(c, 0), a = !c.Asleep || d && !c.Frozen, !a || !1 !== c.Opts.onSleep.call(this, e))c.Asleep = !z(c, d ? -1 : 1), c.Frozen = c.Frozen || d, a && b.trigger("docksleep", [e]), d ? c.Stamp = c.OnDock = 0 : F(2, c, 0, 1)
            };
        g.jqdock = g.jqDock = function () {
            return {
                version: "2.0.1", defaults: {
                    size: 48,
                    sizeMax: 0,
                    capSizing: 0,
                    distance: 72,
                    coefficient: 1.5,
                    duration: 300,
                    align: "bottom",
                    labels: 0,
                    source: 0,
                    loader: 0,
                    inactivity: 0,
                    fadeIn: 0,
                    fadeLayer: "",
                    step: 50,
                    setLabel: 0,
                    flow: 0,
                    idle: 0,
                    onReady: 0,
                    onSleep: 0,
                    onWake: 0,
                    noBuffer: 0,
                    active: -1,
                    bias: 50,
                    noAntiFlutter: 0
                }, nextId: 0, useJqLoader: g.browser.opera || g.browser.safari, init: function (a) {
                    var b = g(a), c = x(b), d = c.Opts, e = r[d.vh], f = r[e.inv], t = c.Border, h = d.fadeLayer, l = d.labels, i = c.ElCt, k = g("<div/>").css({
                        position: "relative",
                        padding: 0
                    }), o = k.clone().css({
                        margin: 0,
                        border: "0 none",
                        backgroundColor: "transparent"
                    }), s = 0, q = 0, n, u, j, p;
                    X(a);
                    for (b.children().each(function (a, b) {
                        var e = c.Elem[a].Wrap = g(b).wrap(o.clone().append(o.clone())).parent();
                        "h" === d.vh && e.parent().css("float",
                            "left");
                        g("*", e).css({
                            position: "relative",
                            padding: 0,
                            margin: 0,
                            borderWidth: 0,
                            borderStyle: "none",
                            verticalAlign: "top",
                            display: "block",
                            width: "100%",
                            height: "100%"
                        })
                    }); q < i;)j = c.Elem[q++], n = j.Pad, p = K(j, d.size, f, d.capSizing), j.Major = j.Final = j.Initial = p[e.wh], j.Item = j.Wrap.css(p).parent(), j.Img.attr({alt: ""}).parent("a").andSelf().removeAttr("title"), c[f.wh] = Math.max(c[f.wh], d.size + n[f.lead] + n[f.trail]), j.Offset = s, j.Centre = s + n[e.lead] + j.Initial / 2, s += j.Initial + n[e.lead] + n[e.trail];
                    for (q = 0; q < i;)for (u in j = c.Elem[q++],
                        n = j.Pad[e.lead] + j.Pad[e.trail], c.Spread += j.Initial + n, {Centre: 1, Offset: 1}) {
                        M(c, j[u]);
                        s = 0;
                        for (f = i; f--;)s += c.Elem[f].Final + n;
                        s > c[e.wh] && (c[e.wh] = s)
                    }
                    for (; q;)j = c.Elem[--q], j.Final = j.Initial;
                    b.wrapInner(k.addClass(m[6]).append(o.attr({
                        id: c.Id,
                        "class": m[8],
                        style: ""
                    }).css({
                        position: "absolute",
                        top: 0,
                        left: 0,
                        padding: 0,
                        margin: 0,
                        overflow: "visible",
                        height: c.height,
                        width: c.width
                    })));
                    e = c.Yard = g("#" + c.Id);
                    for (f = 4; f--;)t[f] = E(e.css("border" + A[f] + "Width"));
                    for (t = e.parent().width(c.width + t[1] + t[3]).height(c.height + t[0] +
                    t[2]); q < i;)j = c.Elem[q], n = j.Item.css("padding", j.Pad.join("px ") + "px"), $(c, q, j.Final, !0), n.addClass(m[1]).add(j.Img).addClass(m[2] + q), n = j.Label, n.el = g("<div/>").css({
                        position: "absolute",
                        margin: 0
                    }).addClass(m[3] + " " + m[3] + j.Link).insertAfter(j.Img).hide().on("click", ea), l && (k = "b" === l.charAt(0), u = "r" === l.charAt(1), n.el.css({
                        top: k ? "auto" : 0,
                        left: u ? "auto" : 0,
                        bottom: k ? 0 : "auto",
                        right: u ? 0 : "auto"
                    })), j = d.setLabel.call(a, j.Title, q, n.el[0]), !1 !== j && g("<div/>").addClass(m[3] + "Text").html(j.toString()).appendTo(n.el),
                        ++q;
                    j = b.on(B.join(" "), P);
                    e.on(I.join(" "), w[1], ca).find("*").css({filter: "inherit"});
                    c.Elem[d.active] && F(0, c, d.active, 2);
                    c.Asleep = !1 === d.onReady.call(a, "ready");
                    c.Asleep || (h ? ("menu" !== h && (j = "dock" === h ? e : t), c.Asleep = !!g(w[8] + "," + w[6], j).addClass(m[4]).css({filter: "inherit"}), j.css({opacity: 0}), Y(b), j.animate({opacity: 1}, d.fadeIn, function () {
                        var a = y(this);
                        x(a).Asleep = !g(w[4], this).add(this).css({filter: ""}).removeClass(m[4]);
                        a.trigger("dockshow", ["ready"]).trigger(B[0])
                    })) : (Y(b), b.trigger("dockshow",
                        ["ready"]), H(c)))
                }, convert: function (a) {
                    return T.call(g(a).get(0))
                }
            }
        }();
        g.fn.jqdock = g.fn.jqDock = function (a) {
            var b = this, c, d;
            "nudge" === a || "idle" === a || "freeze" === a ? b.filter(w[0]).each(function () {
                P.call(this, {type: "dock" + a})
            }) : "destroy" === a ? b = b.map(function () {
                var a = g(this).filter(w[0]), b = x(a.removeClass(m[0])), c = g.extend({}, a.data(o[3])), d, l, i, k;
                if (a.length && b) {
                    a.removeData(o[0]);
                    z(b, -1);
                    a.off(B.join(" "), P);
                    for (d = 0; d < b.ElCt; d++)for (l in i = b.Elem[d], (i.Label.el || g()).remove(), k = i.Img, k.attr(i.Orig.i).removeClass(m[2] +
                    d), i.Orig.i.style || k.removeAttr("style"), "Link" === i.Link && (k = k.parent(), k.attr(i.Orig.a), i.Orig.a.style || k.removeAttr("style")), c.el ? g(k.data(o[2])).after(k).remove() : a.append(k), i.Label.el = i.Orig.i = i.Orig.a = null, i)i[l] = null;
                    g(w[6], a).empty().remove();
                    l = b.Style;
                    c.el ? (a.empty().remove(), i = g(c.el).removeData(o[1]).attr(c.attr), c.attr.style || i.removeAttr("style")) : l ? a.attr("style", l) : a.removeAttr("style");
                    for (d in b)b[d] = null
                }
                return c.el || this
            }) : "active" === a || "expand" === a ? b.each(function () {
                var b = y(this,
                    1), c = y(b), d = x(c);
                d && (z(d, -1), d.Frozen || (d.Frozen = d.Asleep = !!c.trigger("docksleep", ["freeze"])), F(0, d, G(b), "active" === a ? 2 : 1))
            }) : "get" === a ? (b = b.eq(0), c = b.is("img"), b = ((d = x(c ? y(b) : b)) && c ? d.Elem[G(y(b, 1))] : d) || null) : b.length && !b.not("img").length ? b.each(function (b, c) {
                var d = x(y(c)), d = d ? d.Elem[G(y(c, 1))] : 0, h = 0, l, i, k;
                a = a || {};
                if (d) {
                    l = d.Major === d.Initial;
                    for (k in{
                        src: 1,
                        altsrc: 1
                    })a[k] && (i = (g.isFunction(a[k]) ? a[k].call(c, d[k], k) : a[k]).toString(), d[k] !== i && (d[k] = i, h = ("src" === k ? l : !l) ? k : h));
                    h && g(c).attr("src",
                        d[h])
                }
            }) : b = b.map(T).filter(function () {
                var a = g(this).children();
                return !y(this).length && a.length && !a.not("img").filter(function () {
                        return 1 !== g(this).children("img").parent("a").children().length
                    }).length
            }).each(function () {
                var b = g(this).addClass(m[0]), c = g("img", b), d = {
                        Menu: b,
                        Id: m[8] + g.jqdock.nextId++,
                        Elem: [],
                        OnDock: 0,
                        Stamp: 0,
                        width: 0,
                        height: 0,
                        Spread: 0,
                        Border: [],
                        Opts: g.extend({}, g.jqdock.defaults, b.data("jqdock"), S(b.data()), a || {}),
                        Current: -1,
                        Load: c.length,
                        ElCt: c.length,
                        ToFro: ["", "", 0],
                        Style: b.attr("style")
                    },
                    h = d.Opts, l, i;
                for (i in{
                    size: 1,
                    distance: 1,
                    duration: 1,
                    inactivity: 1,
                    fadeIn: 1,
                    step: 1,
                    idle: 1,
                    active: 1,
                    sizeMax: 1
                })h[i] = E(h[i]);
                i = 1 * h.coefficient;
                h.coefficient = isNaN(i) ? 1.5 : i;
                if (l = {
                        middle: 1,
                        center: 2
                    }[h.align])i = E(h.bias), 1 > i && (h.align = 2 > l ? "top" : "left"), 99 < i && (h.align = 2 > l ? "bottom" : "right"), h.bias = i;
                h.labels && !/^[tmb][lcr]$/.test(h.labels.toString()) && (h.labels = {
                        top: "br",
                        left: "tr"
                    }[h.align] || "tl");
                h.setLabel || (h.setLabel = fa);
                h.fadeLayer = h.fadeIn ? {dock: 1, wrap: 1}[h.fadeLayer] ? h.fadeLayer : "menu" : "";
                for (i in{
                    onSleep: 1,
                    onWake: 1, onReady: 1
                })h[i] || (h[i] = !1 === h[i] ? da : g.noop);
                l = /^m|c$/.test(h.labels);
                h.attenuation = Math.pow(h.distance, h.coefficient);
                h.vh = {left: 1, center: 1, right: 1}[h.align] ? "v" : "h";
                b.data(o[0], d);
                c.each(function (a, c) {
                    var f = g(c), i = f.parent("a"), n = i.attr("title") || "", m = {}, j, p, o;
                    for (j in{src: 1, alt: 1, title: 1, style: 1})m[j] = f.attr(j) || "";
                    o = (h.source ? h.source.call(c, a) : "") || f.data("jqdockAltsrc") || "" || (/\.(gif|jpg|jpeg|png)$/i.test(m.alt || "") ? m.alt : "") || m.src;
                    d.Elem[a] = {
                        Img: f,
                        src: m.src,
                        altsrc: o,
                        Title: m.title ||
                        n || "",
                        Orig: {i: g.extend({}, m), a: {title: n, style: i.attr("style") || ""}},
                        Label: {mc: l},
                        Pad: [],
                        Link: i.length ? "Link" : "Image"
                    };
                    for (j = 4; j--;)d.Elem[a].Pad[j] = E(f.css("padding" + A[j]));
                    if (h.loader ? h.loader === "jquery" : g.jqdock.useJqLoader)g("<img>").on("load", {
                        idx: a,
                        menu: b[0]
                    }, U).attr({src: o}); else {
                        p = new Image;
                        p.onload = function () {
                            U.call(this, {data: {idx: a, menu: b[0]}});
                            p.onload = "";
                            p = null
                        };
                        p.src = o
                    }
                })
            }).end();
            return b
        }
    }
    g(function () {
        g(".jqDockAuto").jqdock()
    })
})(jQuery, window);
const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"posts.index":{"uri":"posts","methods":["GET","HEAD"]},"posts.edit":{"uri":"posts\/{id}\/edit","methods":["GET","HEAD"]},"posts.store":{"uri":"posts\/store","methods":["POST"]},"posts.update":{"uri":"posts\/{id}\/update","methods":["PUT"]},"posts.destroy":{"uri":"posts\/{id}\/destroy","methods":["DELETE"]},"datatables.publish":{"uri":"datatables-publish","methods":["POST"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };

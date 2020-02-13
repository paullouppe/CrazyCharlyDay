function test(e) {
    $(e.target);
}

export function init() {
    $('').on("click", test);
    console.log("test");
}
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @script
        <script>
           

                let stafID = 0;
                $(".deleteBtn").click(function(e) {
                    e.preventDefault();
                    stafID = $(this).attr("data-id");
                    Swal.fire({
                        title: "ایا تاسو مطمین یاستی؟",
                        text: "ایا غواری چی دا کارکوونکی پاک کری!",
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#34c38f",
                        cancelButtonColor: "#f46a6a",
                        confirmButtonText: "هو, پاک یی کړه!",
                    }).then(function(t) {
                        if (t.isConfirmed) {
                            $wire.dispatch('deleteStaff', {
                                clickedStaff: stafID
                            });
                        }
                    });

                });

                window.addEventListener("staffDeleted", event => {
                    $("#staffRow-id-" + stafID).addClass("d-none");
                    Swal.fire(
                        "پاک شو!",
                        "کارکوونکی له لیست څخه پاک شو.",
                        "success"
                    );

                });
            

        </script>
    @endscript
    
</div>

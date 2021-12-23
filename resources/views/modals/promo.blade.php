<div class="modal fade" id="promo-modal" tabindex="-1" role="dialog" aria-labelledby="promo-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="promo-modal-title">Choose Promo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @forelse ($promos as $p)
                    <div class="card" style="width: 10rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted" id="{{ $p->id }}-discount">Discount:
                                {{ $p->discount }}%</h6>
                            <input type="radio" name="promo_id" id="{{ $p->id }}" value="{{ $p->id }}"
                                {{ $p->isused == 1 ? 'disabled' : '' }}>
                        </div>
                    </div>
                @empty
                    No promos available.
                @endforelse
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="clearPromo()">Reset</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateDiscount()">Choose
                    promo</button>
            </div>
        </div>
    </div>
</div>

<script>
    function clearPromo() {
        var ele = document.getElementsByName("promo_id");

        if ($('input[name="promo_id"]:checked').attr('id') != null) {
            var discount = getNum(document.getElementById('discount-text').innerHTML);
            var percentage_paid = 100 - discount;

            var cost_text = document.getElementById('cost-text');
            cost_text.innerHTML = "Cost: " + getNum(cost_text.innerHTML) / percentage_paid * 100;
        }

        for (var i = 0; i < ele.length; i++)
            ele[i].checked = false;
        document.getElementById("discount-text").innerHTML = "Discount: -";
    }

    function updateDiscount() {
        //get checked radio

        if ($('input[name="promo_id"]:checked').attr('id') == null)
            return;

        var selected_promo_id = $('input[name="promo_id"]:checked').attr('id');
        var discount_text = document.getElementById('discount-text');
        var cost_text = document.getElementById('cost-text');

        discount_text.innerHTML = document.getElementById(selected_promo_id + "-discount").innerHTML;

        var newcost = getNum(cost_text.innerHTML) - getNum(cost_text.innerHTML) * (getNum(discount_text.innerHTML) /
            100);

        cost_text.innerHTML = "Cost: " + newcost.toFixed(2);
    }

    function getNum(string) {
        return parseFloat(string.match(/[\d\.]+/));
    }
</script>

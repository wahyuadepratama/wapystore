<!-- categories -->
<aside class="widget widget-categories box-shadow">
    <h6 class="widget-title">Order Filter</h6>
    <div class="product-cat">
        <ul class="list-group">
            <li class="list-group-item list-group-item-{{ Request::is('job') ? 'success' : '' }}"><a href="/job">New Order</a>

            </li>
            <li class="list-group-item list-group-item-{{ Request::is('job/on-progress', 'job/on-progress/*') ? 'success' : '' }}"><a href="/job/on-progress">On Progress Order</a>

            </li>
            <li class="list-group-item list-group-item-{{ Request::is('job/revision', 'job/revision/*') ? 'success' : '' }}"><a href="/job/revision">Revision Order</a>
                <ul>
                    <!-- <li><a href="#">Mobile</a></li>                     -->
                </ul>
            </li>
            <li class="list-group-item list-group-item-{{ Request::is('job/closed', 'job/closed/*') ? 'success' : '' }}"><a href="/job/closed">Closed Order</a>
                <ul>
                    <!-- <li><a href="#">Mobile</a></li>                     -->
                </ul>
            </li>
        </ul>
    </div>
</aside>

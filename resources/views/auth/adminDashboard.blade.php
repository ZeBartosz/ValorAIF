<x-layout>


    <div>
        <!-- Tab buttons -->
        <div class="tab">
            <button class="tablinks active" onclick="openTable(event, 'Table1')">Users</button>
            <button class="tablinks" onclick="openTable(event, 'Table2')">Posts</button>
        </div>
        
        <!-- Tables -->
        <div id="Table1" class="table-content active">
            <h3>Table 1</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
                <tr>
                    <td>John</td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>Jane</td>
                    <td>30</td>
                </tr>
            </table>
        </div>
        
        <div id="Table2" class="table-content">
            <h3>Table 2</h3>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>Laptop</td>
                    <td>$1000</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>$500</td>
                </tr>
            </table>
        </div>
        
        <div id="Table3" class="table-content">
            <h3>Table 3</h3>
            <table>
                <tr>
                    <th>City</th>
                    <th>Country</th>
                </tr>
                <tr>
                    <td>New York</td>
                    <td>USA</td>
                </tr>
                <tr>
                    <td>Tokyo</td>
                    <td>Japan</td>
                </tr>
            </table>
        </div>
     
</div>    



</x-layout>

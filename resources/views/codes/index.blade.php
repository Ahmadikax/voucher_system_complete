<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Codes - Voucher System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            margin-bottom: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-info {
            background-color: #17a2b8;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .status-available {
            background-color: #d4edda;
            color: #155724;
        }
        .status-sold {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status-reserved {
            background-color: #fff3cd;
            color: #856404;
        }
        .actions {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }
        form {
            display: inline;
        }
        .stats {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .stat-box {
            padding: 15px;
            border-radius: 4px;
            flex: 1;
            text-align: center;
        }
        .stat-box h3 {
            margin: 0;
            font-size: 24px;
        }
        .stat-box p {
            margin: 5px 0 0;
        }
        .available-box {
            background-color: #d4edda;
            color: #155724;
        }
        .sold-box {
            background-color: #f8d7da;
            color: #721c24;
        }
        .reserved-box {
            background-color: #fff3cd;
            color: #856404;
        }
        .action-buttons {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .search-form input,
        .search-form select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 5px;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 5px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: black;
        }
        .code-image {
            max-width: 100px;
            max-height: 100px;
            cursor: pointer;
        }
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        .pagination li {
            margin-right: 5px;
        }
        .pagination li a,
        .pagination li span {
            display: block;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
            text-decoration: none;
        }
        .pagination li.active span {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        .pagination-container {
            overflow-x: auto;
            margin-bottom: 20px;
        }
        .full-code, .masked-code {
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Codes: {{ $product->name }}</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <div class="stats">
            <div class="stat-box available-box">
                <h3>{{ $availableCount }}</h3>
                <p>Available</p>
            </div>
            <div class="stat-box sold-box">
                <h3>{{ $soldCount }}</h3>
                <p>Sold</p>
            </div>
            <div class="stat-box reserved-box">
                <h3>{{ $reservedCount }}</h3>
                <p>Reserved</p>
            </div>
        </div>
        
        <div class="action-buttons">
            <a href="{{ route('products.index') }}" class="btn">Back to Products</a>
            <a href="{{ route('product.codes.create', $product->id) }}" class="btn btn-success">Add Code</a>
            <button class="btn btn-info" onclick="openImportModal()">Import Codes</button>
            <button class="btn btn-info" onclick="openExportModal()">Export Codes</button>
            <button class="btn" id="toggleCodesBtn" onclick="toggleCodes()">Show Actual Codes</button>
            <button class="btn btn-danger" onclick="confirmDeleteAllCodes()">Delete All Codes</button>
        </div>
        
        <div class="search-form">
            <form action="{{ route('product.codes.index', $product->id) }}" method="GET">
                <input type="text" name="search" placeholder="Search codes..." value="{{ request('search') }}">
                <select name="status">
                    <option value="">All Statuses</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                    <option value="reserved" {{ request('status') == 'reserved' ? 'selected' : '' }}>Reserved</option>
                </select>
                <button type="submit" class="btn btn-sm">Filter</button>
            </form>
        </div>
        
        @if($codes->isEmpty())
            <p>No codes found for this product.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Expires</th>
                        <th>Created At</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($codes as $code)
                        <tr>
                            <td>
                                @if($codeMasking)
                                    <span id="code-{{ $code->id }}" class="masked-code">{{ $code->getMaskedCode() }}</span>
                                    <span id="full-code-{{ $code->id }}" class="full-code" style="display: none;">{{ $code->code }}</span>
                                @else
                                    <span id="code-{{ $code->id }}">{{ $code->code }}</span>
                                @endif
                                <button class="btn btn-sm" onclick="copyCode('{{ $code->code }}', {{ $code->id }})">Copy</button>
                            </td>
                            <td>{{ $code->description }}</td>
                            <td>
                                <span class="status-badge status-{{ $code->status }}">
                                    {{ ucfirst($code->status) }}
                                </span>
                            </td>
                            <td>{{ $code->expires_at ? $code->expires_at->format('Y-m-d') : 'Never' }}</td>
                            <td>{{ $code->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                @if($code->code_image_path)
                                    <img src="{{ asset('storage/' . $code->code_image_path) }}" alt="Code Image" class="code-image" onclick="openImageModal('{{ asset('storage/' . $code->code_image_path) }}')">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td class="actions">
                                <button class="btn btn-sm btn-info" onclick="openEmailModal({{ $code->id }})">Email</button>
                                
                                @if($code->status !== 'sold')
                                    <form action="{{ route('codes.send-email', $code->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="email" value="mark_as_sold@example.com">
                                        <input type="hidden" name="mark_as_sold" value="1">
                                        <button type="submit" class="btn btn-sm btn-warning">Mark Sold</button>
                                    </form>
                                @endif
                                
                                @if($code->status !== 'available')
                                    <form action="{{ route('codes.reset-status', $code->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Reset</button>
                                    </form>
                                @endif
                                
                                <form action="{{ route('codes.destroy', $code->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this code?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pagination-info" style="text-align: center; margin: 20px 0;">
                Showing {{ $codes->firstItem() }} to {{ $codes->lastItem() }} of {{ $codes->total() }} results
            </div>
            
            @if ($codes->lastPage() > 1)
            <div style="text-align: center; margin: 20px 0;">
                @for ($i = 1; $i <= $codes->lastPage(); $i++)
                    <a href="{{ $codes->url($i) }}" style="margin: 0 5px; padding: 5px 10px; {{ $i == $codes->currentPage() ? 'background-color: #007bff; color: white;' : 'color: #007bff;' }} text-decoration: none; border-radius: 3px;">
                        {{ $i }}
                    </a>
                @endfor
            </div>
            @endif
        @endif
    </div>
    
    <!-- Import Modal -->
    <div id="importModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeImportModal()">&times;</span>
            <h2>Import Codes</h2>
            <form action="{{ route('product.codes.import', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="import_file">Select File (CSV or TXT)</label>
                    <input type="file" id="import_file" name="import_file" required>
                    <p>Each line should contain one code.</p>
                </div>
                <div class="form-group">
                    <label for="description">Description (Optional)</label>
                    <input type="text" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="expires_at">Expiration Date (Optional)</label>
                    <input type="date" id="expires_at" name="expires_at">
                </div>
                <button type="submit" class="btn">Import</button>
            </form>
        </div>
    </div>
    
    <!-- Export Modal -->
    <div id="exportModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeExportModal()">&times;</span>
            <h2>Export Codes</h2>
            <form action="{{ route('product.codes.export', $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="format">Export Format</label>
                    <select id="format" name="format" required>
                        <option value="csv">CSV</option>
                        <option value="txt">TXT</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Filter by Status</label>
                    <select id="status" name="status">
                        <option value="all">All Codes</option>
                        <option value="available">Available Only</option>
                        <option value="sold">Sold Only</option>
                        <option value="reserved">Reserved Only</option>
                    </select>
                </div>
                <button type="submit" class="btn">Export</button>
            </form>
        </div>
    </div>
    
    <!-- Email Modal -->
    <div id="emailModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEmailModal()">&times;</span>
            <h2>Send Code via Email</h2>
            <form id="emailForm" action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="mark_as_sold" value="1">
                        Mark as sold after sending
                    </label>
                </div>
                <button type="submit" class="btn">Send</button>
            </form>
        </div>
    </div>
    
    <!-- Image Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeImageModal()">&times;</span>
            <h2>Code Image</h2>
            <img id="modalImage" src="" alt="Code Image" style="max-width: 100%;">
        </div>
    </div>
    
    <script>
        // Toggle between masked and full codes
        let showingFullCodes = false;
        
        function toggleCodes() {
            showingFullCodes = !showingFullCodes;
            const toggleBtn = document.getElementById('toggleCodesBtn');
            const maskedCodes = document.querySelectorAll('.masked-code');
            const fullCodes = document.querySelectorAll('.full-code');
            
            if (showingFullCodes) {
                toggleBtn.textContent = 'Hide Actual Codes';
                maskedCodes.forEach(code => code.style.display = 'none');
                fullCodes.forEach(code => code.style.display = 'inline');
            } else {
                toggleBtn.textContent = 'Show Actual Codes';
                maskedCodes.forEach(code => code.style.display = 'inline');
                fullCodes.forEach(code => code.style.display = 'none');
            }
        }
        
        // Copy code to clipboard
        function copyCode(code, id) {
            navigator.clipboard.writeText(code).then(function() {
                alert('Code copied to clipboard!');
            }, function() {
                alert('Failed to copy code. Please try again.');
            });
        }
        
        // Import Modal
        function openImportModal() {
            document.getElementById('importModal').style.display = 'block';
        }
        
        function closeImportModal() {
            document.getElementById('importModal').style.display = 'none';
        }
        
        // Export Modal
        function openExportModal() {
            document.getElementById('exportModal').style.display = 'block';
        }
        
        function closeExportModal() {
            document.getElementById('exportModal').style.display = 'none';
        }
        
        // Email Modal
        function openEmailModal(codeId) {
            document.getElementById('emailForm').action = '/codes/' + codeId + '/send-email';
            document.getElementById('emailModal').style.display = 'block';
        }
        
        function closeEmailModal() {
            document.getElementById('emailModal').style.display = 'none';
        }
        
        // Image Modal
        function openImageModal(imageSrc) {
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('imageModal').style.display = 'block';
        }
        
        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
        }
        
        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target == document.getElementById('importModal')) {
                closeImportModal();
            } else if (event.target == document.getElementById('exportModal')) {
                closeExportModal();
            } else if (event.target == document.getElementById('emailModal')) {
                closeEmailModal();
            } else if (event.target == document.getElementById('imageModal')) {
                closeImageModal();
            }
        }
        
        // Confirm delete all codes
        function confirmDeleteAllCodes() {
            if (confirm('Are you sure you want to delete ALL codes for this product? This action cannot be undone.')) {
                window.location.href = "{{ route('product.codes.index', $product->id) }}?delete_all=true";
            }
        }
    </script>
</body>
</html>
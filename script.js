
        // Sample data for demonstration
        let products = [
            { id: 1, name: 'Wireless Headphones', price: 99.99, description: 'High-fidelity audio with noise cancellation and comfortable earcups.' },
            { id: 2, name: 'Smartwatch Pro', price: 249.00, description: 'Track your fitness, receive notifications, and make calls from your wrist.' },
            { id: 3, name: 'Portable Bluetooth Speaker', price: 59.95, description: 'Compact design with powerful sound and long-lasting battery life.' },
        ];
        let nextProductId = 4; // To generate unique IDs

        const productList = document.getElementById('productList');
        const addProductBtn = document.getElementById('addProductBtn');
        const productNameInput = document.getElementById('productName');
        const productPriceInput = document.getElementById('productPrice');
        const productDescriptionInput = document.getElementById('productDescription');
        const noProductsMessage = document.getElementById('noProductsMessage');

        const editModal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');
        const editProductIdInput = document.getElementById('editProductId');
        const editProductNameInput = document.getElementById('editProductName');
        const editProductPriceInput = document.getElementById('editProductPrice');
        const editProductDescriptionInput = document.getElementById('editProductDescription');
        const cancelEditBtn = document.getElementById('cancelEditBtn');
        const saveEditBtn = document.getElementById('saveEditBtn');

        const messageBox = document.getElementById('messageBox');
        const messageText = document.getElementById('messageText');

        // Function to show a message
        function showMessage(message, type = 'info') {
            messageText.textContent = message;
            messageBox.className = `fixed bottom-8 right-8 px-6 py-3 rounded-lg shadow-lg z-50 ${type === 'success' ? 'bg-green-600' : type === 'error' ? 'bg-red-600' : 'bg-blue-600'} text-white`;
            messageBox.classList.remove('hidden');
            setTimeout(() => {
                messageBox.classList.add('hidden');
            }, 3000);
        }

        // Render products to the UI
        function renderProducts() {
            productList.innerHTML = ''; // Clear existing products
            if (products.length === 0) {
                noProductsMessage.classList.remove('hidden');
            } else {
                noProductsMessage.classList.add('hidden');
                products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.className = 'bg-white rounded-lg shadow-md p-5 border border-gray-200';
                    productCard.innerHTML = `
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">${product.name}</h3>
                        <p class="text-gray-600 text-sm mb-2 line-clamp-2">${product.description}</p>
                        <p class="text-lg font-bold text-green-600 mb-4">$${product.price.toFixed(2)}</p>
                        <div class="flex justify-end space-x-2">
                            <button class="edit-btn bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium py-2 px-4 rounded-md shadow-sm transform hover:scale-105 transition duration-200 ease-in-out" data-id="${product.id}">Edit</button>
                            <button class="delete-btn bg-red-500 hover:bg-red-600 text-white text-sm font-medium py-2 px-4 rounded-md shadow-sm transform hover:scale-105 transition duration-200 ease-in-out" data-id="${product.id}">Delete</button>
                        </div>
                    `;
                    productList.appendChild(productCard);
                });
            }
            addEventListeners(); // Re-attach event listeners after re-rendering
        }

        // Add event listeners for edit and delete buttons
        function addEventListeners() {
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.onclick = (e) => openEditModal(parseInt(e.target.dataset.id));
            });
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.onclick = (e) => deleteProduct(parseInt(e.target.dataset.id));
            });
        }

        // Create operation
        addProductBtn.addEventListener('click', () => {
            const name = productNameInput.value.trim();
            const price = parseFloat(productPriceInput.value);
            const description = productDescriptionInput.value.trim();

            if (!name || isNaN(price) || price <= 0 || !description) {
                showMessage('Please fill in all product details correctly.', 'error');
                return;
            }

            const newProduct = {
                id: nextProductId++,
                name: name,
                price: price,
                description: description
            };

            products.push(newProduct);
            renderProducts();
            showMessage('Product added successfully!', 'success');

            // Clear form fields
            productNameInput.value = '';
            productPriceInput.value = '';
            productDescriptionInput.value = '';
        });

        // Read operation (initial render)
        renderProducts();

        // Update operation (open modal)
        function openEditModal(id) {
            const productToEdit = products.find(p => p.id === id);
            if (productToEdit) {
                editProductIdInput.value = productToEdit.id;
                editProductNameInput.value = productToEdit.name;
                editProductPriceInput.value = productToEdit.price;
                editProductDescriptionInput.value = productToEdit.description;
                editModal.classList.remove('hidden');
                // Animate modal in
                setTimeout(() => {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            }
        }

        // Update operation (save changes)
        saveEditBtn.addEventListener('click', () => {
            const id = parseInt(editProductIdInput.value);
            const name = editProductNameInput.value.trim();
            const price = parseFloat(editProductPriceInput.value);
            const description = editProductDescriptionInput.value.trim();

            if (!name || isNaN(price) || price <= 0 || !description) {
                showMessage('Please fill in all fields correctly.', 'error');
                return;
            }

            const productIndex = products.findIndex(p => p.id === id);
            if (productIndex > -1) {
                products[productIndex] = { ...products[productIndex], name, price, description };
                renderProducts();
                closeEditModal();
                showMessage('Product updated successfully!', 'success');
            } else {
                showMessage('Product not found.', 'error');
            }
        });

        // Close modal
        cancelEditBtn.addEventListener('click', closeEditModal);
        editModal.addEventListener('click', (e) => {
            if (e.target === editModal) { // Close only if clicking outside the modal content
                closeEditModal();
            }
        });

        function closeEditModal() {
            // Animate modal out
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                editModal.classList.add('hidden');
            }, 300); // Match transition duration
        }

        // Delete operation
        function deleteProduct(id) {
            // In a real application, you might add a confirmation dialog here
            const confirmed = confirm('Are you sure you want to delete this product?');
            if (!confirmed) {
                return;
            }

            products = products.filter(product => product.id !== id);
            renderProducts();
            showMessage('Product deleted successfully!', 'success');
        }

        // Basic confirmation dialog replacement
        function confirm(message) {
            const response = window.prompt(message + " (Type 'yes' to confirm)");
            return response && response.toLowerCase() === 'yes';
        }



        // Js Object Defination

        let myfunction = mydfunction(4,3);
        function mydfunction(a,b){
            let res = a * b;
            
            return res * a + b;
        }

        console.log(myfunction);
        
DELETE FROM categories
WHERE id NOT IN (SELECT category_id FROM products);

DELETE FROM products
WHERE id NOT IN (SELECT product_id FROM availabilities);

DELETE FROM stocks
WHERE id NOT IN (SELECT stock_id FROM availabilities);
SELECT
  vbo.from_store_id AS from_store_id,
  vbo.transfer_id AS transfer_id,
  vbo.Store_Name AS Store_Name,
  vbo.Product_Name AS Product_Name,
  vbo.product_id AS product_id,
  vbo.inpermit_product_id AS inpermit_product_id,
  vbo.RunID AS RunID,
  SUM(vbo.Q) AS Q,
  vbo.Public_Price AS Public_Price,
  vbo.expire_date AS expire_date,
  vbo.Buy_Price AS Buy_Price,
  (SUM(vbo.Q) * netPrice(vbo.Buy_Price, vbo.Public_Price)) AS Total
FROM (SELECT
    transfers.from_store_id AS from_store_id,
    transfer_product.transfer_id AS transfer_id,
    stores.Store_Name AS Store_Name,
    products.Product_Name AS Product_Name,
    transfer_product.product_id AS product_id,
    inpermit_product.id AS inpermit_product_id,
    transfer_product.RunID AS RunID,
    transfer_product.Quantity AS Q,
    inpermit_product.Public_Price AS Public_Price,
    inpermit_product.expire_date AS expire_date,
    inpermit_product.Buy_Price AS Buy_Price,
    (transfer_product.Quantity * netPrice(inpermit_product.Buy_Price, inpermit_product.Public_Price)) AS Total
  FROM ((((((SELECT
        transfers.id AS id,
        transfers.transfer_code AS transfer_code,
        transfers.transfer_details AS transfer_details,
        transfers.transfer_status_id AS transfer_status_id,
        transfers.transfer_name AS transfer_name,
        transfers.transfer_phone AS transfer_phone,
        transfers.transfer_date AS transfer_date,
        transfers.from_store_id AS from_store_id,
        transfers.to_store_id AS to_store_id,
        transfers.user_id AS user_id,
        transfers.updated_at AS updated_at,
        transfers.created_at AS created_at
      FROM transfers
      WHERE (transfers.transfer_status_id <> 40 and))) transfers
    JOIN transfer_product
      ON ((transfers.id = transfer_product.transfer_id)))
    JOIN products
      ON ((products.id = transfer_product.product_id)))
    JOIN stores
      ON ((stores.id = transfers.from_store_id)))
    JOIN inpermit_product
      ON (((transfer_product.product_id = inpermit_product.product_id)
      AND (transfer_product.RunID = inpermit_product.runID))))
  GROUP BY transfer_product.RunID,
           transfer_product.product_id,
           transfer_product.transfer_id) vbo
GROUP BY vbo.from_store_id,
         vbo.product_id,
         vbo.RunID









=============================
SELECT
  vbo.from_store_id AS from_store_id,
  vbo.transfer_id AS transfer_id,
  vbo.Store_Name AS Store_Name,
  vbo.Product_Name AS Product_Name,
  vbo.product_id AS product_id,
  vbo.inpermit_product_id AS inpermit_product_id,
  vbo.RunID AS RunID,
  SUM(vbo.Q) AS Q,
  vbo.Public_Price AS Public_Price,
  vbo.expire_date AS expire_date,
  vbo.Buy_Price AS Buy_Price,
  (SUM(vbo.Q) * netPrice(vbo.Buy_Price, vbo.Public_Price)) AS Total
FROM (SELECT
    transfers.from_store_id AS from_store_id,
    transfer_product.transfer_id AS transfer_id,
    stores.Store_Name AS Store_Name,
    products.Product_Name AS Product_Name,
    transfer_product.product_id AS product_id,
    inpermit_product.id AS inpermit_product_id,
    transfer_product.RunID AS RunID,
    transfer_product.Quantity AS Q,
    inpermit_product.Public_Price AS Public_Price,
    inpermit_product.expire_date AS expire_date,
    inpermit_product.Buy_Price AS Buy_Price,
    (transfer_product.Quantity * netPrice(inpermit_product.Buy_Price, inpermit_product.Public_Price)) AS Total
  FROM ((((((SELECT
        transfers.id AS id,
        transfers.transfer_code AS transfer_code,
        transfers.transfer_details AS transfer_details,
        transfers.transfer_status_id AS transfer_status_id,
        transfers.transfer_name AS transfer_name,
        transfers.transfer_phone AS transfer_phone,
        transfers.transfer_date AS transfer_date,
        transfers.from_store_id AS from_store_id,
        transfers.to_store_id AS to_store_id,
        transfers.user_id AS user_id,
        transfers.updated_at AS updated_at,
        transfers.created_at AS created_at
      FROM transfers
      WHERE (transfers.transfer_status_id <> 40 and))) transfers
    JOIN transfer_product
      ON ((transfers.id = transfer_product.transfer_id)))
    JOIN products
      ON ((products.id = transfer_product.product_id)))
    JOIN stores
      ON ((stores.id = transfers.from_store_id)))
    JOIN inpermit_product
      ON (((transfer_product.product_id = inpermit_product.product_id)
      AND (transfer_product.RunID = inpermit_product.runID))))
  GROUP BY transfer_product.RunID,
           transfer_product.product_id,
           transfer_product.transfer_id) vbo
GROUP BY vbo.from_store_id,
         vbo.product_id,
         vbo.RunID

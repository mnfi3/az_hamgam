SELECT *
  FROM [orders] o 
  full JOIN orders_content oc ON o.id = oc.order_id
  full JOIN order_content_desserts ocd ON ocd.orders_content_id = oc.id
where o.id=1
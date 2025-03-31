export enum Position {
  BOTH = 'both',
  NONE = 'none',
  LEFT = 'left',
  RIGHT = 'right'
}

export interface Holder {
  position: Position;
}

export interface Product {
  bottomColor?: string;
  deskLegs?: boolean;
  ventHoles?: boolean;
  mainColor?: string;
  phoneHolder?: string;
  tabletHolder?: string;
  whiteboard?: string;
}